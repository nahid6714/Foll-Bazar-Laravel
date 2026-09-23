<?php
namespace App\Models;
use App\Models\Concerns\GeneratesHexId;
use Illuminate\Database\Eloquent\Model;
class Banner extends Model
{
 protected $table='site_banners'; use GeneratesHexId; protected $fillable=['banner_type','title','alt_text','image_url','link_url','sort_order','is_active']; protected $casts=['is_active'=>'boolean'];
}
