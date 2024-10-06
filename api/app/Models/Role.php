<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @method static inRandomOrder()
 * @method static where(string $string, $role_name)
 */
class Role extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'type'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
