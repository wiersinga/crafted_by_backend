<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @method static inRandomOrder()
 */
class Address extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'street',
        'ZIPCode',
        'city',
        'countryCode'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
