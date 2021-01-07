<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Account extends BaseModel
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Account_Approvers';
//     protected $table = 'Account_Approvers_Test';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['account', 'location'];
    
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
    protected $fillable = ['account', 'approver', 'last_updater', 'last_updated', 'verified', 'location'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static function accountApproversByLocation($cc = 'UK')
    {
        $data = Cache::remember('Account.accountApproversByLocation'.$cc, 33660, function() use($cc)
        {
            return DB::table('Account_Approvers')
                ->select('approver','account')
                ->distinct()
                ->where('location', $cc)
                ->get();
        });
        
        $return = $data->mapWithKeys(function ($item) {
            return [$item->account => $item->approver];
        });
        
        return $return;
    }
    
    public static function verifiedAccountByLocation($cc = 'UK')
    {
        $data = Cache::remember('Account.verifiedAccountByLocation'.$cc, 33660, function() use($cc)
        {
            return DB::table('Account_Approvers')
                ->select('verified','account')
                ->distinct()
                ->where('location', $cc)
                ->get();
        });
        
        $return = $data->mapWithKeys(function ($item) {
            return [$item->account => $item->verified];
        });
        
        return $return;
    }
    
    public static function verifiedLocations()
    {
        $data = Cache::remember('Account.verifiedLocations', 33660, function()
        {
            return DB::table('Account_Approvers')
                ->select('location')
                ->distinct()
                ->where('verified', 'Yes')
                ->where('location', '<>', '')
                ->get();
        });
        
        $return = $data->mapWithKeys(function ($item) {
            return [$item->location => $item->location];
        });
        
        return $return;
    }
    
    public static function accounts()
    {
        $data = Cache::remember('Account.accounts', 33660, function()
        {
            return DB::table('Account_Approvers')
                ->select('account')
                ->where('account', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approvers()
    {
        $data = Cache::remember('Account.approvers', 33660, function()
        {
            return DB::table('Account_Approvers')
                ->select('approver')
                ->where('approver', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function verified()
    {
        $data = Cache::remember('Account.verified', 33660, function()
        {
            return DB::table('Account_Approvers')
                ->select('verified')
                ->where('verified', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function locations()
    {
        $data = Cache::remember('Account.locations', 33660, function()
        {
            return DB::table('Account_Approvers')
                ->select('location')
                ->where('location', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function getWithPredicates($predicates)
    {
        $columns = array(
            'account', 'approver', 'verified', 'location'
        );
        
        $data = Cache::remember('Account.getWithPredicates'.serialize($predicates), 33660, function() use ($predicates, $columns)
        {
            return self::select($columns)
                ->where($predicates)
                ->get();
        });
        
        return $data;
    }
}
