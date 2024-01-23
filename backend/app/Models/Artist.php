<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Artist extends Model
{
    use HasFactory, HasUuids;

    protected $fillable=[
      'name', 'siret','history','craftingDescription', 'speciality_id','user_id','theme_id',
    ];

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
