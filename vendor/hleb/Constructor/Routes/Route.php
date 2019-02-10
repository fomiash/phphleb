<?php

use \hleb\Scheme\Home\Constructor\Routes\{
    StandardRoute, RouteMethodStandard
};
use \hleb\Constructor\Routes\Methods\{
    RouteMethodGet, RouteMethodType, RouteMethodName, RouteMethodController,
    RouteMethodGetGroup, RouteMethodEndGroup, RouteMethodBefore, RouteMethodAfter, RouteMethodWhere, RouteMethodGetType,
    RouteMethodEndType, RouteMethodEnd, RouteMethodPrefix, RouteMethodProtect, RouteMethodGetProtect, RouteMethodEndProtect,
    RouteMethodRenderMap
};
use \hleb\Constructor\Routes\MainRoute;

class Route extends MainRoute implements StandardRoute
{
    use DeterminantStaticUncreated;

    private static $object_methods = [];

    private static $data_methods = [];

    private static $number = 1000;


    public static function get($route, $params = [])
    {

        return self::add(new RouteMethodGet(self::instance(), $route, $params));
    }

    public static function getGroup($name = null)
    {

        return self::add(new RouteMethodGetGroup(self::instance(), $name));
    }

    public static function endGroup($name = null)
    {

        return self::add(new RouteMethodEndGroup(self::instance(), $name));
    }

    public static function before($class_name, array $params = [])
    {

        return self::add(new RouteMethodBefore(self::instance(), $class_name, $params));
    }

    public static function after($class_name, array $params = [])
    {

        return self::add(new RouteMethodAfter(self::instance(), $class_name, $params));
    }

    public static function where($params)
    {

        return self::add(new RouteMethodWhere(self::instance(), $params));
    }

    public static function type($types)
    {

        return self::add(new RouteMethodType(self::instance(), $types));

    }

    public static function getType($types)
    {

        return self::add(new RouteMethodGetType(self::instance(), $types));
    }

    public static function endType()
    {

        return self::add(new RouteMethodEndType(self::instance()));
    }

    public static function renderMap($name, $map)
    {

        return self::add(new RouteMethodRenderMap(self::instance(), $name, $map));
    }

    public static function protect($validate = "CSRF")
    {

        return self::add(new RouteMethodProtect(self::instance(), $validate));

    }

    public static function getProtect($validate = "CSRF")
    {

        return self::add(new RouteMethodGetProtect(self::instance(), $validate));
    }

    public static function endProtect()
    {

        return self::add(new RouteMethodEndProtect(self::instance()));
    }

    public static function name($name)
    {

        return self::add(new RouteMethodName(self::instance(), $name));
    }

    public static function controller($class_name, array $params = [])
    {

        return self::add(new RouteMethodController(self::instance(), $class_name, $params));

    }

    public static function prefix($add)
    {

        return self::add(new RouteMethodPrefix(self::instance(), $add));
    }

    public static function end()
    {

        self::$data_methods = (new RouteMethodEnd(self::instance()))->data();

        return null;

    }


    ///////////////CREATE///////////////

    /**
     * @param RouteMethodStandard $method
     * @return null|static
     */
    private static function create(RouteMethodStandard $method)
    {


        self::$object_methods[] = $method;

        if ($method->approved()) {

            return self::instance();
        }

        return null;


    }

    private static function add(RouteMethodStandard $method)
    {

        $data = $method->data();

        self::$number++;

        $data['number'] = self::$number;

        self::$data_methods[] = $data;

        return self::create($method);

    }


    public static function data()
    {

        return self::$data_methods;
    }

    public static function delete()
    {

        self::$instance = null;
    }
}