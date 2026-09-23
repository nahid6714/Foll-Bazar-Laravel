<?php
namespace App\Http\Controllers\Api;
use App\Models\Category;
class CategoryController extends BaseApiController { public function index(){return $this->ok(Category::where('is_active',true)->orderBy('sort_order')->orderBy('name')->get());} public function show(Category $category){return $this->ok($category->load('products'));} }
