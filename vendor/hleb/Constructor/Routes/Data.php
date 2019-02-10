<?php

namespace hleb\Constructor\Routes;

use \DeterminantStaticUncreated;

class Data
{
    use DeterminantStaticUncreated;

    private static $data = [];

    public static function create_data(array $array)
    {
        if(!count(self::$data)) self::$data = $array;
    }

    public static function return_data()
    {
        return self::$data;
    }


}