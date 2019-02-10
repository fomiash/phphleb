<?php

namespace hleb\Constructor\Routes\Methods;

use hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute
};
use \hleb\Constructor\Routes\MainRouteMethod;
use hleb\Main\Errors\ErrorOutput;

class RouteMethodName extends MainRouteMethod
{

    protected $instance;

    /**
     * RouteMethodName constructor.
     * @param StandardRoute $instance
     * @param string $name
     */
    function __construct(StandardRoute $instance, string $name)
    {
        $this->method_type_name = "name";

        $this->instance = $instance;

        $this->calc($name);

    }


    private function calc($name)
    {

        $this->data_name = $name;

        $instance_data = $this->instance->data();

        foreach ($instance_data as $inst) {

            if ($inst["data_name"] === $name) {

                $this->errors[] = "HL017-ROUTE_ERROR: Wrong argument to method ->name() ! " .
                    "Name duplication: " . $name . " ~ " .
                    "Исключение в методе ->name() ! Такое название уже используется: " . $name;

                ErrorOutput::add($this->errors);
            }

        }

    }


}