<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model
{
 use GeneratesHexId; protected $fillable=['order_number','user_id','customer_name','customer_phone','customer_email','address','order_note','shipping_method','delivery_area','subtotal','delivery_charge','discount_amount','total_amount','payment_method','payment_status','payment_title','sender_phone','trx_id','coupon_code','status','division','district','upazila','delivery_note'];
 protected $casts=['subtotal'=>'decimal:2','delivery_charge'=>'decimal:2','discount_amount'=>'decimal:2','total_amount'=>'decimal:2'];
 public function user(): BelongsTo { return $this->belongsTo(User::class); }
 public function items(): HasMany { return $this->hasMany(OrderItem::class); }
}
