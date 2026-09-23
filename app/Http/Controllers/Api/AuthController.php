<?php
namespace App\Http\Controllers\Api;
use App\Http\Requests\LoginRequest; use App\Http\Requests\RegisterRequest; use App\Services\AuthService; use Illuminate\Http\Request;
class AuthController extends BaseApiController { public function __construct(private AuthService $auth){} public function register(RegisterRequest $r){return $this->ok($this->auth->register($r->validated()),201);} public function login(LoginRequest $r){return $this->ok($this->auth->login($r->identifier,$r->password));} public function me(Request $r){return $this->ok($this->auth->userData($r->user()));} public function logout(Request $r){$r->user()->currentAccessToken()?->delete();return $this->ok();} }
