<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodPrefix extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodName constructor.
     * @param StandardRoute $instance
     * @param string $prefix
     */
    function __construct(StandardRoute $instance, string $prefix)
    {
        $this->method_type_name = "prefix";

        $this->instance = $instance;

        $this->calc($prefix);

    }


    private function calc($prefix)
    {

        $this->data_path = $prefix;

    }


}