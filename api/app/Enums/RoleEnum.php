<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

enum RoleEnum: string
{
    case Admin = 'admin';
    case Artist = 'artist';
    case Client = 'client';

}


