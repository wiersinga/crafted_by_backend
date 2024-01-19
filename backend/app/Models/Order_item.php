<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Order_item extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;


    protected $fillable = [

    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
    public function product_item(): HasMany
    {
        return $this->hasMany(Product_item::class);
    }
}
