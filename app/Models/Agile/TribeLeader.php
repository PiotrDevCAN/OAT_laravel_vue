<?php

namespace App\Models\Agile;

use Illuminate\Database\Eloquent\Model;

class TribeLeader extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Log';
    
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
    protected $fillable = ['log_entry', 'last_updater', 'last_updated'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'ibmi-agile';
}
