<?php

namespace App\Helpers\BluePages\Models;

use Adldap\Models\User;

class OpenIBMLDAPUser extends User
{
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getObjectGuid();
    }
    
    /**
     * Get the "remember me" token value.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->getFirstAttribute($this->getRememberTokenName());
    }
    
    /**
    * Get the column name for the "remember me" token.
    *
    * @return string
    */
    public function getRememberTokenName()
    {
        return 'uid';
    }
}