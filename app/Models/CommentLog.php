<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetTableName;

class CommentLog extends Model
{
    use GetTableName, HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Comment_Log';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'request';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
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
    protected $fillable = ['request', 'comment'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    /**
     * Get the commentLog record associated with the commentLog.
     */
    public function comment()
    {
        return $this->hasOne('App\Model\Comment', 'reference');
    }
    
    /**
     * Get the commentLog record associated with the commentLog.
     */
    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'reference', 'comment');
    }
    
    /**
     * Get the request that owns the commentLog.
     */
    public function OTrequest()
    {
        return $this->belongsTo('App\Models\OvertimeRequest', 'request', 'reference');
    }
}
