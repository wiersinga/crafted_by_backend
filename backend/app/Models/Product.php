<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;

    public function product_item(): BelongsToMany
    {
        return $this->belongsToMany(Product_item::class);
    }

    protected $fillable = [
        'name',
        'description',
        'price',
    ];


    public function material(): HasOne
    {
        return $this->hasOne(Material::class);
    }
    public function artist(): HasOne
    {
        return $this->hasOne(Artist::class);
    }
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function review(): BelongsToMany
    {
        return $this->belongsToMany(Review::class);
    }
}
