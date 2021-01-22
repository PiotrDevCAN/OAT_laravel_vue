<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OvertimeRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Requests';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'reference';
    
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
        'requestor',
        'requested',
        'competency',
        'approvaltype',
        'title',
        'account',
        'weekenddate',
        'nature',
        'details',
        'worker',
        'serial',
        'hours',
        'status',
        'rejection',
        'supercedes',
        'supercededby',
        'claim_acc_id',
        'approver_first_level',
        'approver_first_level_ts',
        'approver_second_level',
        'approver_second_level_ts',
        'approver_third_level',
        'approver_third_level_ts',
        'location',
        'recoverable',
        'delete_flag',
        'created_ts',
        'import',
        'approval_first_level_via',
        'approval_second_level_via',
        'approval_third_level_via',
        'approval_mode',
        'approver_squad_leader',
        'approver_tribe_leader'
    ];
    
    /**
     * The connection name for the model.
     *
     * @var string
     */
//     protected $connection = 'ibmi';
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static $limit = 10;
    
    public static $awaitingStatus = 'Awaiting';
    public static $approvedStatus = 'Approved';
    
    public static function imports()
    {
        return collect(array(
            (object) array ('import' => 'Yes'),
            (object) array ('import' => 'No')
        ));
    }
    
    public static function recoverables()
    {
        return collect(array(
            (object) array ('recoverable' => 'Yes'),
            (object) array ('recoverable' => 'No'),
            (object) array ('recoverable' => 'Delivery Centre')
        ));
    }
    
    public static function natures()
    {
        return collect(array (
            (object) array ('nature' => 'Service Out of Hours'),
            (object) array ('nature' => 'Compliance'),
            (object) array ('nature' => 'RFS/Revenue'),
            (object) array ('nature' => 'RFS Schedule'),
            (object) array ('nature' => 'Hol/Sickness Cover'),
            (object) array ('nature' => 'T&T'),
            (object) array ('nature' => 'Delivery Centre Load Balancing'),
            (object) array ('nature' => 'Other')
        ));
    }
    
    public static function accounts()
    {
        $data = Cache::remember('OvertimeRequest.accounts', 33660, function()
        {
            return self::select('account')
                ->where('account', '<>', '')
                ->distinct()
                ->get();
        });
    
        return $data;
    }
    
    public static function workers()
    {
        $data = Cache::remember('OvertimeRequest.workers', 33660, function()
        {
            return self::select('worker')
                ->where('worker', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approvalTypes()
    {
        $data = Cache::remember('OvertimeRequest.approvalTypes', 33660, function()
        {
            return self::select('approvaltype')
                ->where('approvaltype', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function competencies()
    {
        $data = Cache::remember('OvertimeRequest.competencies', 33660, function()
        {
            return self::select('competency')
                ->where('competency', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function statuses()
    {
        $data = Cache::remember('OvertimeRequest.statuses', 33660, function()
        {
            return self::select('status')
                ->where('status', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function requestors()
    {
        $data = Cache::remember('OvertimeRequest.requestors', 33660, function()
        {
            return self::select('requestor')
                ->where('requestor', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function locations()
    {
        $data = Cache::remember('OvertimeRequest.locations', 33660, function()
        {
            return self::select('location')
                ->where('location', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function weekendDates()
    {
        $data = Cache::remember('OvertimeRequest.weekendDates', 33660, function()
        {
            return self::select('weekenddate')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function weekendStartDates()
    {
        $data = Cache::remember('OvertimeRequest.weekendStartDates', 33660, function()
        {
            return self::select('weekenddate as weekendstart')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function weekendEndDates()
    {
        $data = Cache::remember('OvertimeRequest.weekendEndDates', 33660, function()
        {
            return self::select('weekenddate as weekendend')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approversFirstLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_first_level', 33660, function()
        {
            return self::select('approver_first_level')
                ->where('approver_first_level', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approversSecondLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_second_level', 33660, function()
        {
            return self::select('approver_second_level')
                ->where('approver_second_level', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approversThirdLevel()
    {
        $data = Cache::remember('OvertimeRequest.approvers_third_level', 33660, function()
        {
            return self::select('approver_third_level')
                ->where('approver_third_level', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approvalModes()
    {
        $data = Cache::remember('OvertimeRequest.approval_modes', 33660, function()
        {
            return self::select('approval_mode')
                ->where('approval_mode', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function squadLeaders()
    {
        $data = Cache::remember('OvertimeRequest.approver_squad_leaders', 33660, function()
        {
            return self::select('approver_squad_leader')
                ->where('approver_squad_leader', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function tribeLeaders()
    {
        $data = Cache::remember('OvertimeRequest.approver_tribe_leaders', 33660, function()
        {
            return self::select('approver_tribe_leader')
                ->where('approver_tribe_leader', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    /**
     * Get the commentLog record associated with the request.
     */
    public function commentLog()
    {
        return $this->hasOne('App\CommentLog', 'request');
    }
    
    /**
     * Get the commentLog record associated with the request.
     */
    public function commentLogs()
    {
        return $this->hasMany('App\CommentLog', 'request', 'reference');
    }
    
    /**
     * Get the Comment for the request.
     */
    public function comment()
    {
        return $this->hasOneThrough(
            'App\Models\Comment',
            'App\Models\CommentLog',
            'request',
            'reference',
            'reference',
            'comment'
        );
    }
    
    /**
     * Get all of the Comments for the request.
     */
    public function comments()
    {
        return $this->hasManyThrough(
            'App\Models\Comment',
            'App\Models\CommentLog',
            'request',
            'reference',
            'reference',
            'comment'
            );
    }
    
    public static function awaiting($predicates, $page = 1)
    {
        $data = Cache::remember('OvertimeRequest.awaiting'.serialize($predicates).$page.static::$limit, 33660, function() use ($predicates)
        {
            return self::where('status', 'like', 'Awaiting%')
                ->whereNull('delete_flag')
                ->where($predicates)
                ->paginate(static::$limit);
        });
        
        return $data;
    }
    
    public static function approved($predicates, $page = 1)
    {
        $data = Cache::remember('OvertimeRequest.approved'.serialize($predicates).$page.static::$limit, 33660, function() use ($predicates)
        {
            return self::where('status', 'Approved')
                ->whereNull('delete_flag')
                ->where($predicates)
                ->paginate(static::$limit);
        });
        
        return $data;
    }
    
    public static function other($predicates, $page = 1)
    {
        $data = Cache::remember('OvertimeRequest.other'.serialize($predicates).$page.static::$limit, 33660, function() use ($predicates)
        {
            return self::where('status',  'not like', 'Awaiting%')
                ->where('status', '<>', 'Approved')
                ->whereNull('delete_flag')
                ->where($predicates)
                ->paginate(static::$limit);
        });
        
        return $data;
    }
}