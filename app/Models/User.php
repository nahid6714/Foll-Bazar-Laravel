<?php
namespace App\Models;

use App\Models\Concerns\GeneratesHexId;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, GeneratesHexId;
    protected $table = 'users';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['email','password_hash','role'];
    protected $hidden = ['password_hash'];
    public function getAuthPassword(){ return $this->password_hash; }
    public function profile(): HasOne { return $this->hasOne(Profile::class,'id','id'); }
    public function orders(): HasMany { return $this->hasMany(Order::class); }
    public function complaints(): HasMany { return $this->hasMany(Complaint::class); }
    public function wishlists(): HasMany { return $this->hasMany(Wishlist::class); }
    public function couponsUsed(): BelongsToMany { return $this->belongsToMany(Coupon::class,'coupon_usages'); }
}
