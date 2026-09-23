<?php
namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseApiController
{
    public function __construct(private OrderService $orders) {}

    public function index(Request $r)
    {
        return $this->ok(Order::with('items')->where('user_id',$r->user()->id)->latest()->get());
    }

    public function store(Request $r)
    {
        $d = $r->validate([
            'order_number'=>'nullable|string|max:60', 'customer_name'=>'required|string|min:2|max:190',
            'customer_phone'=>'required|string|min:11|max:50', 'customer_email'=>'nullable|email|max:190',
            'address'=>'required|string|min:5', 'order_note'=>'nullable|string', 'division'=>'nullable|string|max:120', 'district'=>'nullable|string|max:120', 'upazila'=>'nullable|string|max:120', 'delivery_note'=>'nullable|string|max:1000',
            'shipping_method'=>'required|in:dhaka,outside', 'payment_method'=>'required|string|max:50',
            'payment_title'=>'nullable|string|max:190', 'sender_phone'=>'nullable|string|max:50', 'trx_id'=>'nullable|string|max:190',
            'coupon_code'=>'nullable|string|max:100', 'items'=>'required|array|min:1',
            'items.*.product_id'=>'required|string', 'items.*.variant_label'=>'nullable|string', 'items.*.quantity'=>'required|integer|min:1|max:50'
        ]);
        if (in_array($d['payment_method'], ['bkash','nagad','rocket'], true) && (empty($d['sender_phone']) || empty($d['trx_id']))) {
            return $this->fail('MFS পেমেন্টের জন্য Sender Phone ও TrxID প্রয়োজন।',422);
        }
        return $this->ok($this->orders->create($d,$r->user()),201);
    }

    public function show(Request $r, Order $order)
    {
        if($order->user_id!==$r->user()->id) return $this->fail('Forbidden',403);
        return $this->ok($order->load('items'));
    }

    public function track(Request $r)
    {
        $q=Order::query();
        if($r->filled('order_number')) $q->whereRaw('UPPER(order_number)=?', [strtoupper($r->order_number)]);
        elseif($r->filled('phone')) $q->where('customer_phone','like','%'.preg_replace('/\D+/','',$r->phone));
        else return $this->ok(null);
        return $this->ok($q->with('items')->latest()->first());
    }
}
