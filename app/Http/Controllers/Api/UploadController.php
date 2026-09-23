<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; use Illuminate\Support\Str;
class UploadController extends BaseApiController { public function store(Request $r){$r->validate(['file'=>'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120','folder'=>'nullable|in:products,banners']);$folder=$r->input('folder','products');$path=$r->file('file')->store($folder,'public');return $this->ok(['url'=>asset('storage/'.$path),'path'=>$path]);} }
