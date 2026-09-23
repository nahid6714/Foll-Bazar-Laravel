<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Api\BaseApiController; use App\Models\SiteSetting; use Illuminate\Http\Request;
class SettingsController extends BaseApiController { public function index(){return $this->ok(SiteSetting::query()->orderBy('setting_key')->get());} public function update(Request $r){$d=$r->validate(['setting_key'=>'required|string|max:190','setting_value'=>'nullable|string']);$s=SiteSetting::updateOrCreate(['setting_key'=>$d['setting_key']],['setting_value'=>$d['setting_value']??null]);return $this->ok($s);} }
