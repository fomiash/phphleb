<?php

namespace hleb\Constructor\Cache;

use \hleb\Constructor\Routes\LoadRoutes;
use \Route;
use hleb\Main\Errors\ErrorOutput;

class CacheRoutes
{
    /**
     * @var null|LoadRoutes
     */
    private $opt = null;

    function __construct()
    {

    }

    /**
     * @return array
     */
    public function load()
    {

        $this->opt = new LoadRoutes();

        if (HLEB_PROJECT_DEBUG) {

            if ($this->opt->comparison()) {

                $cache = $this->opt->load_cache();

                if ($cache === false) {

                    $this->create_routes();

                    return $this->check($this->opt->update(Route::data()));

                }

                return $cache;

            }
        }

        $this->create_routes();

        return $this->check($this->opt->update(Route::data()));

    }


    private function check($data)
    {

        $cache = $this->opt->load_cache();

        if (json_encode($cache) !== json_encode($data)) {

            $errors = "HL021-CACHE_ERROR: No write permission ! " .
                "Failed to save file to folder `/storage/*`.  You need to change permissions on this folder. ~ " .
                "Не удалось сохранить кэш !  Ошибка при записи файла в папку `/storage/*`. Необходимо расширить права для этой папки и вложений всем пользователям.";

            ErrorOutput::get($errors);
        }

        return $data;
    }


    private function create_routes()
    {

        require HLEB_GLOBAL_DIRECTORY . "/routes/main.php";

        Route::end();

    }

}