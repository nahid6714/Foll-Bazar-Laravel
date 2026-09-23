<?php
namespace App\Http\Controllers\Api;
use App\Models\Banner;
class BannerController extends BaseApiController { public function index(){return $this->ok(Banner::where('is_active',true)->orderBy('banner_type')->orderBy('sort_order')->get());} }
