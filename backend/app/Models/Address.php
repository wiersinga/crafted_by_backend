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
    protected $keyType= 'string';
    public $incrementing = false;

//    public static function booted()
//    {
//        static::creating(function ($model){
//            $model->id = Str::uuid();
//        });
//    }
    protected $fillable = [
        'street',
        'ZIPCode',
        'city',
        'countryCode'
    ];

    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class);
    }
}
