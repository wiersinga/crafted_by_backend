<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Color extends Model
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
        'name'
    ];

    public function product_item(): BelongsToMany
    {
        return $this->belongsToMany(Product_item::class);
    }

}
