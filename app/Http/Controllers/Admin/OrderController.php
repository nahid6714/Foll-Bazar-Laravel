<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Api\BaseApiController; use App\Models\Order; use Illuminate\Http\Request;
class OrderController extends BaseApiController { public function index(){return $this->ok(Order::with('items')->latest()->get());} public function show(Order $order){return $this->ok($order->load('items'));} public function update(Request $r,Order $order){$d=$r->validate(['status'=>'sometimes|string|max:50','payment_status'=>'sometimes|string|max:50']);$order->update($d);return $this->ok($order);} }
