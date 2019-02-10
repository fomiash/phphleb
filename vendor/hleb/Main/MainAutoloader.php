<?php

class MainAutoloader
{
    function __construct()
    {
    }

    /**
     * @param $class string
     */
    static function get(string $class)
    {

        if (self::search_and_include($class, new \HomeConnector())) {

            // Проверка внутренних классов

        } else if (self::search_and_include($class, new \MainConnector())) {

            // Проверка пользовательских классов

        } else {

            $clarification = "/";

            // Сокращение внутреннего перенаправления

            $path = explode("\\", $class);

            if (count($path) > 1) {

                $path[0] = strtolower($path[0]);

                $class = implode("/", $path);

            }

            if (strpos($class, 'hleb/') !== false && strpos($class, 'hleb/') == 0) $clarification = '/vendor/';

            // Namespace класса соответствует файловому расположению в проекте

            self::init(HLEB_GLOBAL_DIRECTORY . $clarification . str_replace('\\', "/", $class) . '.php');

        }

    }

    static function search_and_include(string $class, Connector $connector): bool
    {
        $responding = $connector->add();

        //Если найден класс с прямой ссылкой

        if (isset($responding[$class])) {

            self::init(HLEB_GLOBAL_DIRECTORY . "/" . $responding[$class]);

            return true;

        }

        //Если для класса указано только соответствие папки, в которой искать класс по названию

        foreach ($responding as $key => $value) {
            if (strpos($key, '/*') !== false) {

                $cleared_str = str_replace("*", "", $key);

                if (strpos($cleared_str, $class) == 0) {

                    self::init(HLEB_GLOBAL_DIRECTORY . "/" . $value . $class . ".php");

                    return true;
                }
            }

        }

        return false;

    }


    static private function init(string $path)
    {

        if (is_readable($path) !== false) {

            include_once "$path";
        }


    }


}

