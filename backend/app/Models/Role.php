<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * @method static inRandomOrder()
 */
class Role extends Model
{
    use HasFactory, HasUuids;
    protected $keyType= 'string';
    public $incrementing = false;

    protected $fillable = [
        'type'
    ];

    protected $casts = [
        'type' => RoleEnum::class
    ];

    public static function booted()
    {
        static::creating(function ($model){
            $model->id = Str::uuid();
        });
    }

    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class);
    }
}
