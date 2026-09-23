<?php
namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    public function index(Request $r)
    {
        $q = Product::with('category')
            ->where('is_active', true)
            ->when($r->filled('category'), fn($x) => $x->whereHas('category', fn($c) => $c->where('slug', $r->string('category')->toString())))
            ->when($r->filled('search'), function($x) use ($r) {
                $term = trim($r->string('search')->toString());
                $x->where(function($w) use ($term) { $w->where('name','like','%'.$term.'%')->orWhere('description','like','%'.$term.'%'); });
            })
            ->orderBy('sort_order')->orderByDesc('created_at');
        return $this->ok($q->get());
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);
        $product->load(['category','variants'=>fn($q)=>$q->where('is_active',true)->orderBy('sort_order')]);
        return $this->ok($product);
    }
}
