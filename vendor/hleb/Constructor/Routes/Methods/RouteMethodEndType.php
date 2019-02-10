<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodEndType extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodType constructor.
     * @param StandardRoute $instance
     */
    function __construct(StandardRoute $instance)
    {
        $this->method_type_name = "endType";

        $this->instance = $instance;

    }


}