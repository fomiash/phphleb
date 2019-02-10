<?php

namespace hleb\Constructor;

use hleb\Constructor\Routes\Data;
use hleb\Main\Errors\ErrorOutput;

class Workspace
{
    ///Основная обработка роута

    protected $block;

    protected $map;

    protected $hl_content_create = false;

    /**
     * Workspace constructor.
     * @param array $block
     * @param array $map
     */
    function __construct(array $block, array $map)
    {
        $this->block = $block;

        $this->map = $map;

        $this->create($block);
    }

    private function create($block)
    {
        if ($this->hl_content_create) return;

        $actions = $block["actions"];

        foreach ($actions as $key => $action) {

            if (isset($action["before"])) {

                $this->all_action($action["before"], "Before");

            }
        }

        //Обработчик get()

        $this->render_get_method($block);

        foreach ($actions as $key => $action) {

            if (isset($action["after"])) {

                $this->all_action($action["after"], "After");

            }
        }

    }

    private function render_get_method($_hl_excluded_block)
    {
        if ($this->hl_content_create) return;

        $_hl_excluded_params = $_hl_excluded_block["data_params"];

        if (count($_hl_excluded_params) == 0) {

            //Загрузка контроллера

            $_hl_excluded_actions = $_hl_excluded_block["actions"];

            foreach ($_hl_excluded_actions as $_hl_excluded_action) {

                if (isset($_hl_excluded_action["controller"])) {

                    $_hl_excluded_params = self::get_controller($_hl_excluded_action["controller"]);

                    if (gettype($_hl_excluded_params) == "array") {

                        $_hl_excluded_params[0] = [$_hl_excluded_params[0]];

                    } else {

                        $this->hl_content_create = true;

                        print $_hl_excluded_params;


                        return;
                    }

                    break;
                }

            }


        }

        // Создание data() v2


        if (gettype($_hl_excluded_params) == "array" && !empty($_hl_excluded_params[1])) {

            Data::create_data($_hl_excluded_params[1]);

            $_hl_excluded_variables = $_hl_excluded_params[1];

            foreach ($_hl_excluded_variables as $_hl_excluded_key => $_hl_excluded_variable) {

                if (!is_numeric($_hl_excluded_key) && !is_numeric($_hl_excluded_key{0})) {

                    ${$_hl_excluded_key} = $_hl_excluded_variable;
                }
            }

        }


        if (isset($_hl_excluded_params["text"]) && gettype($_hl_excluded_params["text"]) == "string") {

            $this->hl_content_create = true;

            print $_hl_excluded_params["text"];

            return;

        } else if (isset($_hl_excluded_params[2]) && $_hl_excluded_params[2] == "views") {

            //  view(...)

            $_hl_excluded_file = str_replace("//", "/", HLEB_GLOBAL_DIRECTORY . "/resources/views/" . $_hl_excluded_params[0][0] . ".php");

            //Отображение шаблона

            $this->hl_content_create = true;

            if (is_readable($_hl_excluded_file)) {

                include "$_hl_excluded_file";

            }


            return;


        } else if (isset($_hl_excluded_params[2]) && $_hl_excluded_params[2] == "render") {

            // render(...)

            $this->hl_content_create = true;

            $_hl_excluded_maps = $this->map;

            $_hl_excluded_errors = [];

            $_hl_excluded_params_maps = $_hl_excluded_params[0];

            foreach ($_hl_excluded_params_maps as $_hl_excluded_params_map) {

                foreach ($_hl_excluded_maps as $_hl_excluded_key => $_hl_excluded_map_) {

                    if ($_hl_excluded_key == $_hl_excluded_params_map) {

                        foreach ($_hl_excluded_map_ as $_hl_excluded_map) {

                            $_hl_excluded_file = str_replace("//", "/", HLEB_GLOBAL_DIRECTORY . "/resources/views/" . $_hl_excluded_map . ".php");

                            if (file_exists($_hl_excluded_file)) {

                                require "$_hl_excluded_file";

                            } else {

                                $_hl_excluded_errors[] = "HL027-RENDER_ERROR: Error in function render() ! " .
                                    "Missing file `/resources/views/" . $_hl_excluded_map . ".php` . ~ " .
                                    "Исключение в функции render() ! Отсутствует файл `/resources/views/" . $_hl_excluded_map . ".php`";

                                ErrorOutput::add($_hl_excluded_errors);
                            }
                        }
                    }
                }
            }

            if (count($_hl_excluded_errors) > 0) ErrorOutput::run();

        }
    }


    private function all_action(array $action, string $type)
    {

        //Вызов класса с методом

        $arguments = $action[1] ?? [];

        $call = explode("@", $action[0]);

        $initiator = "App\Middleware\\" . $type . "\\" . $call[0];

        $method = $call[1] ?? "index";

        (new $initiator())->{$method}(...$arguments);


    }


    private function get_controller(array $action)
    {
        if ($this->hl_content_create) return null;

        //Вызов controller

        $arguments = $action[1] ?? [];

        $call = explode("@", $action[0]);

        $initiator = "App\Controllers\\" . $call[0];

        $method = $call[1] ?? "index";

        return (new $initiator())->{$method}(...$arguments);


    }


}