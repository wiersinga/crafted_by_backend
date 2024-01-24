<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Order_item extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'quantity', 'order_id', 'product_item_id'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product_item(): BelongsTo
    {
        return $this->belongsTo(Product_item::class);
    }
}
