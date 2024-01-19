<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Artist extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;



    protected $fillable = [
        'siret',
        'history',
        'craftingDescription',
    ];

    public function speciality(): HasOne
    {
        return $this->hasOne(Speciality::class);
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function theme(): HasOne
    {
        return $this->hasOne(Theme::class);
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
