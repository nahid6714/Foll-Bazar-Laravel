<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
class CouponUsage extends Model
{
 use GeneratesHexId; protected $table='coupon_usages'; public $timestamps=false; protected $fillable=['coupon_id','user_id','order_id','created_at']; protected $casts=['created_at'=>'datetime'];
}
