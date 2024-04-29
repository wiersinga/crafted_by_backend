<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**$2y$12$z0x8Ie/57tyY1rua5gRgr.rm3BtVIY…
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'password',
        'email',
        'role_id',
        'address_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
// new changed relation artist
    public function artist(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Artist::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }


//    public function reviews(): HasMany
//    {
//        return $this->hasMany(Review::class);
//    }


}


