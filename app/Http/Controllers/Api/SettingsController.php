<?php
namespace App\Http\Controllers\Api;
use App\Models\SiteSetting;
class SettingsController extends BaseApiController { public function index(){return $this->ok(SiteSetting::query()->orderBy('setting_key')->get()->pluck('setting_value','setting_key'));} }
