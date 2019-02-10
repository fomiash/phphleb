<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodWhere extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodWhere constructor.
     * @param StandardRoute $instance
     * @param array $params
     */
    function __construct(StandardRoute $instance, array $params)
    {
        $this->method_type_name = "where";

        $this->instance = $instance;

        $this->calc($params);

    }


    private function calc($params)
    {

        $this->actions = [$params];

    }


}