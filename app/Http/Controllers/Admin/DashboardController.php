<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Api\BaseApiController; use Illuminate\Support\Facades\DB;
class DashboardController extends BaseApiController { public function index(){ $counts=[]; foreach(['products','categories','orders','complaints','coupons','users'] as $t)$counts[$t]=DB::table($t)->count(); return $this->ok($counts); } }
