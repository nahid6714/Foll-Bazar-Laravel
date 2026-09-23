<?php
namespace App\Http\Controllers\Api;
use App\Models\Wishlist; use Illuminate\Http\Request;
class WishlistController extends BaseApiController { public function index(Request $r){return $this->ok(Wishlist::with('product')->where('user_id',$r->user()->id)->latest()->get());} public function store(Request $r){$d=$r->validate(['product_id'=>'required|string|exists:products,id']);$w=Wishlist::firstOrCreate(['user_id'=>$r->user()->id,'product_id'=>$d['product_id']]);return $this->ok($w,201);} public function destroy(Request $r,string $wishlist){$w=Wishlist::where('user_id',$r->user()->id)->where(fn($q)=>$q->where('id',$wishlist)->orWhere('product_id',$wishlist))->firstOrFail();$w->delete();return $this->ok();} }
