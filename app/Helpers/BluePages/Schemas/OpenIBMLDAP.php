<?php

namespace App\Helpers\BluePages\Schemas;

use Adldap\Schemas\Schema;
// use Adldap\Models\User;
use App\Helpers\BluePages\Models\OpenIBMLDAPUser;

class OpenIBMLDAP extends Schema
{
    /**
     * {@inheritdoc}
     */
    public function accountName()
    {
        return 'uid';
    }
    
    /**
     * {@inheritdoc}
     */
    public function distinguishedName()
    {
        return 'dn';
    }
    
    /**
     * {@inheritdoc}
     */
    public function distinguishedNameSubKey()
    {
        //
    }
    
    /**
     * {@inheritdoc}
     */
    public function filterEnabled()
    {
        return sprintf('(!(%s=*))', $this->lockoutTime());
    }
    
    /**
     * {@inheritdoc}
     */
    public function filterDisabled()
    {
        return sprintf('(%s=*)', $this->lockoutTime());
    }
    
    /**
     * {@inheritdoc}
     */
    public function lockoutTime()
    {
        return 'pwdAccountLockedTime';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectCategory()
    {
        return 'objectclass';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectClassGroup()
    {
        return 'groupofnames';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectClassOu()
    {
        return 'organizationalUnit';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectClassPerson()
    {
        return 'ibmPerson';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectClassUser()
    {
        return 'ibmPerson';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectGuid()
    {
        return 'uid';
    }
    
    /**
     * {@inheritdoc}
     */
    public function objectGuidRequiresConversion()
    {
        return false;
    }
    
    /**
     * {@inheritdoc}
     */
    public function entryModel()
    {
        return OpenIBMLDAPUser::class;
    }
}
