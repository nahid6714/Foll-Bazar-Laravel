<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
 use GeneratesHexId;
 protected $fillable=['legacy_id','name','slug','description','image_url','gallery_urls','old_price','price','stock_quantity','sold_quantity','discount_percent','is_featured','is_flash_sale','is_hot_deal','is_active','sort_order','category_id'];
 protected $casts=['gallery_urls'=>'array','old_price'=>'decimal:2','price'=>'decimal:2','discount_percent'=>'decimal:2','is_featured'=>'boolean','is_flash_sale'=>'boolean','is_hot_deal'=>'boolean','is_active'=>'boolean'];
 public function category(): BelongsTo { return $this->belongsTo(Category::class); }
 public function variants(): HasMany { return $this->hasMany(ProductVariant::class); }
 public function orderItems(): HasMany { return $this->hasMany(OrderItem::class); }
}
