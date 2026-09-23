<?php
namespace App\Http\Controllers;

use App\Models\{Banner,Category,Product,SiteSetting};
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    private function shared(): array
    {
        return [
            'categories'=>Category::where('is_active',true)->orderBy('sort_order')->orderBy('name')->get(),
            'heroBanners'=>Banner::where('is_active',true)->where('banner_type','hero')->orderBy('sort_order')->get(),
            'promoBanners'=>Banner::where('is_active',true)->where('banner_type','promo')->orderBy('sort_order')->get(),
        ];
    }

    public function home()
    {
        $data=$this->shared();
        $data['products']=Product::with('category')->where('is_active',true)->orderBy('sort_order')->orderByDesc('created_at')->get();
        $data['flashProducts']=$data['products']->where('is_flash_sale',true)->values();
        $data['hotProducts']=$data['products']->where('is_hot_deal',true)->values();
        $flashEnd=SiteSetting::find('flash_sale_ends_at')?->setting_value;
        $data['flashSaleEndsAt']=$flashEnd ?: now()->addHours(24)->toIso8601String();
        return view('pages.home',$data);
    }

    public function shop(Request $request)
    {
        $data=$this->shared();
        $q=Product::with('category')->where('is_active',true);
        if($request->filled('category')) $q->whereHas('category',fn($c)=>$c->where('slug',$request->string('category')->toString()));
        if($request->filled('search')) {
            $term=trim($request->string('search')->toString());
            $q->where(fn($x)=>$x->where('name','like','%'.$term.'%')->orWhere('description','like','%'.$term.'%'));
        }
        if($request->filled('min_price')) $q->where('price','>=',max(0,(float)$request->input('min_price')));
        if($request->filled('max_price')) $q->where('price','<=',max(0,(float)$request->input('max_price')));
        if($request->boolean('discounted')) $q->where(function($x){$x->whereNotNull('old_price')->whereColumn('old_price','>','price')->orWhere('discount_percent','>',0);});
        switch($request->input('sort')) {
            case 'price_asc': $q->orderBy('price'); break;
            case 'price_desc': $q->orderByDesc('price'); break;
            case 'name': $q->orderBy('name'); break;
            case 'popular': $q->orderByDesc('sold_quantity'); break;
            case 'newest': default: $q->orderBy('sort_order')->orderByDesc('created_at'); break;
        }
        $data['products']=$q->get();
        $data['selectedCategory']=$request->query('category');
        $data['search']=$request->query('search');
        $data['sort']=$request->query('sort','newest');
        $data['minPrice']=$request->query('min_price');
        $data['maxPrice']=$request->query('max_price');
        $data['discounted']=$request->boolean('discounted');
        return view('pages.shop',$data);
    }

    public function product(string $slug)
    {
        $product=Product::with(['category','variants'=>fn($q)=>$q->where('is_active',true)->orderBy('sort_order')])->where('slug',$slug)->where('is_active',true)->firstOrFail();
        $related=Product::where('is_active',true)->where('category_id',$product->category_id)->where('id','!=',$product->id)->limit(8)->get();
        return view('pages.product',array_merge($this->shared(),compact('product','related')));
    }

    public function auth(string $mode='login') { abort_unless(in_array($mode,['login','register'],true),404); return view('pages.auth',compact('mode')); }
    public function cart(){return view('pages.cart');}
    public function checkout(){return view('pages.checkout');}
    public function track(){return view('pages.track');}
    public function complaint(){return view('pages.complaint');}
    public function wishlist(){return view('pages.wishlist');}
}
