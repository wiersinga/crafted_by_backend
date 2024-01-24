<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
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

    protected $fillable = [
        'firstName',
        'lastName',
        'birthdate',
        'email',
        'role_id',
        'address_id'
    ];


    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }



    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}


