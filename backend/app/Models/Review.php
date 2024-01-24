<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'user_id',
        'product_id'
    ];
    public function user(): BelongsTo
   {
    return $this->belongsTo(User::class);
   }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
