<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ProductVariant extends Model
{
 use GeneratesHexId; protected $fillable=['product_id','label','weight_grams','price','old_price','stock_quantity','is_active','sort_order'];
 protected $casts=['price'=>'decimal:2','old_price'=>'decimal:2','is_active'=>'boolean'];
 public function product(): BelongsTo { return $this->belongsTo(Product::class); }
}
