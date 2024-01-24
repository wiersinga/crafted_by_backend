<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * @method static create(array $all)
 */
class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'artist_id',
        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function product_items(): HasMany
    {
        return $this->hasMany(Product_item::class);
    }
}
