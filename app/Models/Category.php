<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
 use GeneratesHexId; protected $fillable=['name','slug','image_url','is_active','sort_order']; protected $casts=['is_active'=>'boolean'];
 public function products(): HasMany { return $this->hasMany(Product::class); }
}
