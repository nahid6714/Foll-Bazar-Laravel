<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model
{
 use GeneratesHexId; protected $fillable=['order_id','product_id','variant_id','product_name','variant_label','weight_grams','unit_price','quantity','line_total']; protected $casts=['unit_price'=>'decimal:2','line_total'=>'decimal:2'];
 public function order(){return $this->belongsTo(Order::class);} public function product(){return $this->belongsTo(Product::class);} public function variant(){return $this->belongsTo(ProductVariant::class,'variant_id');}
}
