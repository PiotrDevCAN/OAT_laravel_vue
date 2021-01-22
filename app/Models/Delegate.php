<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Delegate extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Delegate';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['user_intranet', 'delegate_intranet'];
    
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
    protected $fillable = ['user_intranet', 'delegate_intranet', 'delegate_notesid'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static $limit = 10;
    
    public static function userIntranets()
    {
        $data = Cache::remember('Delegate.user_intranets', 33660, function()
        {
            return DB::table('Delegate')
                ->select('user_intranet')
                ->where('user_intranet', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function delegateIntranets()
    {
        $data = Cache::remember('Delegate.delegate_intranets', 33660, function()
        {
            return DB::table('Delegate')
                ->select('delegate_intranet')
                ->where('delegate_intranet', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function delegateNotesids()
    {
        $data = Cache::remember('Delegate.delegateNotesids', 33660, function()
        {
            return DB::table('Delegate')
                ->select('delegate_notesid')
                ->where('delegate_notesid', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function getWithPredicates($predicates, $page = 1)
    {
        $columns = array(
            'user_intranet', 'delegate_intranet', 'delegate_notesid'
        );
        
        $data = Cache::remember('Delegate.getWithPredicates'.serialize($predicates).$page.static::$limit, 33660, function() use ($predicates, $columns)
        {
            return self::select($columns)
                ->where($predicates)
                ->paginate(static::$limit);
        });
        
        return $data;
    }
}
