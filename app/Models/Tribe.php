<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'ibmi-agile';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Eu_Tribes';
    
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
    protected $fillable = [
        'squad_assignment_unique_squad_name',
        'doer_or_enabler',
        'cnum',
        'squad_member_email',
        'squad_member_name',
        'resource_type',
        'job_role',
        'specialty',
        'squad_role',
        'manager_email',
        'manager_name',
        'manager_cnum',
        'member_status',
        'activity_log',
        'roleprep',
        'legacy_name'
    ];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
}
