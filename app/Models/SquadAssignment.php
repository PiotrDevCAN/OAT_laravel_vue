<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetTableName;

class SquadAssignment extends Model
{
    use GetTableName;
    
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
    protected $table = 'Eu_Squad_Assignment';
    
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
        'form_type',
        'geo_name',
        'market_name',
        'geo',
        'market',
        'additional_qualifier',
        'account',
        'cu',
        'account_market',
        'tribe_of_tribe',
        'tribe',
        'squad_type',
        'squad_scope',
        'unique_name',
        'current_user',
        'w3_password',
        'leader_email',
        'leader_name',
        'delegate_email',
        'delegate_name',
        'error',
        'account_market_prep',
        'market_prep',
        'account_prep',
        'squad_type_prep',
        'squadscopeprep',
        'lookup_accounts_flag',
        'squad_mgmt_unid',
        'lookup_leader_flag',
        'lookup_delegate_flag',
        'leader_cnum',
        'delegate_cnum',
        'mailing_list',
        'bluegroup',
        'leader_bluegroup_response',
        'delegate_bluegroup_response',
        'squad_base',
        'squad_number',
        'squad_count',
        'tribe_base',
        'tribe_number',
        'tribe_count',
        'tribe_of_tribe_base',
        'tribe_of_tribe_count',
        'tribe_lookup_prep',
        'tribelookupcount',
        'squad_or_tribe_definition_url',
        'squad_or_tribe_management_url',
        'legacy_unique_name',
        'unique_name_iteration_table'
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
