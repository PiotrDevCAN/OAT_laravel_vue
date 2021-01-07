<?php 

namespace App\Helpers\BlueGroups\Facades;

use Illuminate\Support\Facades\Facade;
use App\Helpers\BlueGroups\BlueGroupsService;

/**
 * @method static \App\BlueGroups\Builder to(string $url)
 */
class BlueGroups extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BlueGroupsService::class;
    }

}
