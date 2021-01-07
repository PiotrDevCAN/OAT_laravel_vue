<?php 

namespace App\Helpers\BluePages\Facades;

use Illuminate\Support\Facades\Facade;
use App\Helpers\BluePages\BluePagesService;

/**
 * @method static \App\BluePages\Builder to(string $url)
 */
class BluePages extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BluePagesService::class;
    }

}
