<?php

namespace hleb\Constructor\Handlers;

use \DeterminantStaticUncreated;

class Key
{
    use DeterminantStaticUncreated;

    private static $key = null;

    private static $path = HLEB_GLOBAL_DIRECTORY . "/storage/cache/key/security-key.txt";

    public static function create()
    {

        if (empty(self::$key)) self::$key = self::set();
    }

    private static function set()
    {

        if (isset($_SESSION['HLEB_SECURITY_KEY'])) {

            return $_SESSION['HLEB_SECURITY_KEY'];

        }

        try {

            $randstr = bin2hex(random_bytes(30));

            $keygen = str_shuffle(md5(random_int(100, 100000)) . $randstr);

        } catch (\Exception $ex) {

            $keygen = str_shuffle(md5(rand()));
        }


        if (!file_exists(self::$path)) {

            file_put_contents(self::$path, $keygen, LOCK_EX);

            $_SESSION['HLEB_SECURITY_KEY'] = $keygen;

            return $keygen;

        }

        $key = trim(file_get_contents(self::$path));

        if (empty($key)) {

            $key = $keygen;
        }

        $_SESSION['HLEB_SECURITY_KEY'] = $key;

        return $key;
    }

    public static function get()
    {

        if (empty(self::$key)) self::$key = self::set();

        return self::$key;
    }
}