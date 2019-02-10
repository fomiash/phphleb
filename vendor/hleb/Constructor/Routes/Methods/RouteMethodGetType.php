<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodGetType extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodType constructor.
     * @param StandardRoute $instance
     * @param string|array $type
     */
    function __construct(StandardRoute $instance, $type)
    {
        $this->method_type_name = "getType";

        $this->instance = $instance;

        $this->calc($type);

    }


    private function calc($types)
    {
        if (!empty($types)) $this->type = [];

        if (gettype($types) == "string") $types = [strtolower($types)];

        foreach ($types as $type) {

            $this->type[] = strtolower($type);

            if (!in_array(strtolower($type), $this->types)) {

                $this->errors[] = "HL009-ROUTE_ERROR: Wrong argument to method  ->getType() ! " .
                    "In stock `" . $type . "` expected in `" . implode(",", array_unique($this->types)) . "`. ~ " .
                    "Неправильный аргумент в методе ->getType() ! В наличии `" . $type . "`, ожидалось получить из `" . implode(",", array_unique($this->types)) . "`.";

                ErrorOutput::add($this->errors);

            }

        }

    }


}