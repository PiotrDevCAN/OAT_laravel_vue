<?php
namespace App\Helpers\BlueGroupsManage;

use stdClass;

class Builder {
    
/**
     * Set the URL to which the request is to be sent
     *
     * @param $url string   The URL to which the request is to be sent
     * @return Builder
     */
    public function to($url)
    {
        return $this->withCurlOption( 'URL', $url );
    }
}
