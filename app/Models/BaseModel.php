<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetTableName;

class BaseModel extends Model
{
    use GetTableName;
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
    protected function setKeysForSaveQuery($query)
    {
        if( ! is_array($this->getKeyName()))
        {
            return parent::setKeysForSaveQuery($query);
        }
        
        //
        // START FIX
        //
        
        // Convert primary key into an array if it's a single value
        $primary = (count($this->getKeyName()) > 1) ? $this->getKeyName() : [$this->getKeyName()];
        
        // Fetch the primary key(s) values before any changes
        $unique = array_intersect_key($this->original, array_flip($primary));
        
        // Fetch the primary key(s) values after any changes
        $unique = !empty($unique) ? $unique : array_intersect_key($this->getAttributes(), array_flip($primary));
        
        // Apply SQL logic
        $query->where($unique);
        
        //
        // END FIX
        //
        
        return $query;
    }
}