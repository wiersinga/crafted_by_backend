<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product_item extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;

    public static function booted()
    {
        static::creating(function ($model){
            $model->id = Str::uuid();
        });
    }

    protected $fillable = [

    ];

    public function color(): HasOne
    {
        return $this->hasOne(Color::class);
    }
    public function size(): HasOne
    {
        return $this->hasOne(Size::class);
    }
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function order_item(): BelongsToMany
    {
        return $this->belongsToMany(Order_item::class);
    }
}
