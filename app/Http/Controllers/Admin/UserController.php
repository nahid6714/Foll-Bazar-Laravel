<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Api\BaseApiController; use App\Models\User; use Illuminate\Http\Request;
class UserController extends BaseApiController { public function index(){return $this->ok(User::with('profile')->latest()->get(['id','email','role','created_at','updated_at']));} public function show(User $customer){return $this->ok($customer->load('profile'));} public function update(Request $r,User $customer){$d=$r->validate(['role'=>'sometimes|in:customer,admin']);$customer->update($d);if(isset($d['role']))$customer->profile()->update(['role'=>$d['role']]);return $this->ok($customer->load('profile'));} }
