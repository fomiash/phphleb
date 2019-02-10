<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodGetProtect extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodGetProtect constructor.
     * @param StandardRoute $instance
     * @param string $protect
     */
    function __construct(StandardRoute $instance, string $protect = "CSRF")
    {
        $this->method_type_name = "getProtect";

        $this->instance = $instance;

        $this->calc($protect);

    }


    private function calc($protect)
    {

        $this->protect[] = $protect;

    }


}