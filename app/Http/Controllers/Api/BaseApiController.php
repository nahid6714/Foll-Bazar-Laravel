<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
class BaseApiController extends Controller { protected function ok($data=[],$status=200){return response()->json(['ok'=>true,'data'=>$data],$status,[],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);} protected function fail($message,$status=400){return response()->json(['ok'=>false,'error'=>$message],$status,[],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);} }
