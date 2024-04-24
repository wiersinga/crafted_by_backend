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

class Product_item extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;

    protected $fillable = [
        'product_item', 'size_id', 'color_id'
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function order_items(): HasMany
    {
        return $this->hasMany(Order_item::class);
    }
}
