<?php

namespace App\Models;

use Illuminate\Auth\GenericUser;

class IBMUser extends GenericUser
{
    public function getAuthIdentifierName()
    {
        return 'cnum';
    }
}