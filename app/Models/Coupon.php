<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Coupon extends Model
{
 use GeneratesHexId; protected $fillable=['code','discount_type','discount_value','min_order','max_discount','usage_limit','used_count','is_active','starts_at','expires_at'];
 protected $casts=['discount_value'=>'decimal:2','min_order'=>'decimal:2','max_discount'=>'decimal:2','is_active'=>'boolean','starts_at'=>'datetime','expires_at'=>'datetime'];
 public function usages(): HasMany { return $this->hasMany(CouponUsage::class); }
}
