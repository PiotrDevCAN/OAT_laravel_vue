<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetTableName;

class Cc extends Model
{
    use GetTableName, HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Cc_Approvers';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['approver', 'cc'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
    //         'delayed' => false,
    ];
}
