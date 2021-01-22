<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Competency extends BaseModel
{    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Competency_Approvers';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['competency', 'approver'];
    
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
    protected $fillable = ['competency', 'approver', 'last_updater', 'last_updated'];
    
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
//         'delayed' => false,
    ];
    
    public static $limit = 10;
    
    public static function competenciesByAccount()
    {
        $data = Cache::remember('Competency.competenciesByAccount', 33660, function()
        {
            return self::select('approver','competency')
                ->distinct()
                ->get();
        });
        
        $return = $data->mapWithKeys(function ($item) {
            return [$item->competency => $item->approver];
        });
        
        return $return;
    }
    
    public static function competencies()
    {
        $data = Cache::remember('Competency.competencies', 33660, function()
        {
            return self::select('competency')
                ->where('competency', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function approvers()
    {
        $data = Cache::remember('Competency.approvers', 33660, function()
        {
            return self::select('approver')
                ->where('approver', '<>', '')
                ->distinct()
                ->get();
        });
        
        return $data;
    }
    
    public static function getWithPredicates($predicates, $page = 1)
    {
        $columns = array(
            'competency', 'approver', 'last_updater', 'last_updated'
        );
        
        $data = Cache::remember('Competency.getWithPredicates'.serialize($predicates).$page.static::$limit, 33660, function() use ($predicates, $columns)
        {
            return self::select($columns)
                ->where($predicates)
                ->paginate(static::$limit);
        });
        
        return $data;
    }
}
