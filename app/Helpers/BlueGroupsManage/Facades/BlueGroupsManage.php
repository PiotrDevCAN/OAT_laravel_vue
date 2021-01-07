<?php 

namespace App\Helpers\BlueGroupsManage\Facades;

use Illuminate\Support\Facades\Facade;
use App\Helpers\BlueGroupsManage\BlueGroupsManageService;

/**
 * @method static \App\BlueGroups\Builder to(string $url)
 */
class BlueGroupsManage extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BlueGroupsManageService::class;
    }

}
