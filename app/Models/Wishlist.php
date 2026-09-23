<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
class Wishlist extends Model
{
 use GeneratesHexId; protected $table='wishlists'; public $timestamps=false; protected $fillable=['user_id','product_id','created_at']; protected $casts=['created_at'=>'datetime'];
 public function product(){return $this->belongsTo(Product::class);} public function user(){return $this->belongsTo(User::class);}
}
