<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetTableName;

class EmailLog extends Model
{
    use GetTableName;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Email_Log';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'record_id';
    
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
    protected $fillable = ['record_id', 'to', 'cc', 'subject', 'message', 'replyto', 'result', 'enabled', 'creator', 'created'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
}
