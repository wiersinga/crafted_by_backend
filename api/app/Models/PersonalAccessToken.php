<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalAccessToken extends \Laravel\Sanctum\PersonalAccessToken
{
    use HasFactory, HasUuids;


    protected $table= 'personal_access_tokens';




}
