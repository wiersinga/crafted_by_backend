<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $keyType= 'string';
    public $incrementing = false;



    protected $fillable = [
        'orderNum',
        'paymentStatus',
        'totalPrice',
    ];

    public function order_item(): BelongsTo
    {
        return $this->belongsTo(Order_item::class);
    }
}
