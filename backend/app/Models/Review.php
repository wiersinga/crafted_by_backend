<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Review extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;


    protected $fillable = [
        'rating',
        'comment',
    ];
    public function user(): HasMany
   {
    return $this->hasMany(User::class);
   }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
