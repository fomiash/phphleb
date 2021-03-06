<?php

session_start();

define('HLEB_PROJECT_DIRECTORY', __DIR__);

define('HLEB_PROJECT_VERSION', "1");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (HLEB_PROJECT_LOG_ON) {

    ini_set('log_errors', 'On');

    ini_set('error_log', HLEB_GLOBAL_DIRECTORY . '/storage/logs/' . date("Y_m_d_") . 'errors.log');
}

ini_set('display_errors', HLEB_PROJECT_DEBUG ? '1' : '0');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$hl_val_array_address = explode("?", $_SERVER['REQUEST_URI']);

$hl_val_address = rawurldecode(array_shift($hl_val_array_address));

$hl_rel_params = count($hl_val_array_address) > 0 ? "?" . implode("?", $hl_val_array_address) : "";// params

$hl_actual_protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https://" : "http://";

$hl_rel_protocol = HLEB_PROJECT_ONLY_HTTPS ? "https://" : $hl_actual_protocol; // protocol

define("HLEB_PROJECT_PROTOCOL", $hl_rel_protocol);

$hl_end_element = explode("/", $hl_val_address);

$hl_file_url = stripos(end($hl_end_element), ".") === false ? false : true;

$hl_rel_address = "";

if (!empty($hl_val_address)) {

    $hl_var_first = HLEB_PROJECT_ENDING_URL ? $hl_val_address : mb_substr($hl_val_address, 0, -1);

    $hl_var_second = HLEB_PROJECT_ENDING_URL ? $hl_val_address . "/" : $hl_val_address;

    $hl_var_all = $hl_val_address{strlen($hl_val_address) - 1} == "/" ? $hl_var_first : $hl_var_second;

    $hl_rel_address = $hl_file_url ? $hl_val_address : $hl_var_all; // address
}

$hl_val_host = $_SERVER['HTTP_HOST'];

$idn = null;

define("HLEB_MAIN_DOMAIN_ORIGIN", $hl_val_host);

if (stripos($hl_val_host, 'xn--') !== false) {

    include(HLEB_GLOBAL_DIRECTORY . '/vendor/idnaconv/idna_convert.class.php');

    $idn = new idna_convert(array('idn_version' => 2008));

    $hl_val_host = $idn->decode($hl_val_host);

}

$hl_val_array_host = explode(".", $hl_val_host);

if (HLEB_PROJECT_GLUE_WITH_WWW == 1) {

    if ($hl_val_array_host[0] == "www") array_shift($hl_val_array_host);

} else if (HLEB_PROJECT_GLUE_WITH_WWW == 2) {

    if ($hl_val_array_host[0] != "www") $hl_val_array_host = array_merge(["www"], $hl_val_array_host);

}


$hl_rel_host_www = implode(".", $hl_val_array_host); // host

define("HLEB_MAIN_DOMAIN", $hl_val_host);

//Проверка на валидность адреса

if (!preg_match(HLEB_PROJECT_VALIDITY_URL, $hl_val_address)) {

    header('Location: ' . $hl_rel_protocol . $hl_rel_host_www, true, 301);
    exit();
}

//Проверка на корректность URL

$hl_rel_host_www = empty($hl_rel_address) ? $hl_rel_host_www . HLEB_PROJECT_ENDING_URL ? "/" : "" : $hl_rel_host_www;

$hl_rel_url = $hl_rel_protocol . (preg_replace("/\/{2,}/", "/", $hl_rel_host_www . $hl_rel_address)) . $hl_rel_params;

$hl_val_array_actual_uri = explode("?", $_SERVER['REQUEST_URI']);

$hl_val_first_actual_uri = rawurldecode(array_shift($hl_val_array_actual_uri));

$hl_val_first_actual_params = count($hl_val_array_actual_uri) > 0 ? "?" . implode("?", $hl_val_array_actual_uri) : "";

$hl_val_actual_host = $idn === null ? $_SERVER['HTTP_HOST'] : $idn->decode($_SERVER['HTTP_HOST']);

$hl_actual_url = $hl_actual_protocol . $hl_val_actual_host . $hl_val_first_actual_uri . $hl_val_first_actual_params;

if ($hl_rel_url !== $hl_actual_url) {

    header('Location: ' . $hl_rel_url, true, 301);
    exit();
}

mb_internal_encoding("UTF-8");


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


require HLEB_GLOBAL_DIRECTORY . "/vendor/hleb/Main/MainAutoloader.php";

require HLEB_GLOBAL_DIRECTORY . "/vendor/hleb/Scheme/Home/Main/Connector.php";

require HLEB_GLOBAL_DIRECTORY . "/app/opt/MainConnector.php";

require HLEB_GLOBAL_DIRECTORY . "/vendor/hleb/Main/HomeConnector.php";


function hl_main_autoloader($class)
{
    MainAutoloader::get($class);
}

spl_autoload_register('hl_main_autoloader');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function hleb_v5ds34hop4nm1d_page_view($view = null, $data = null)
{

    if (func_num_args() === 0) {
        return [null, null, "views"];
    }


    return [$view, $data, "views"];
}

function hleb_gop0m3f4hpe10d_all($view = null, $data = null, $type = "views")
{

    if (func_num_args() === 0) {
        return [null, null, $type];
    }


    return [$view, $data, $type];
}

function hleb_hol6h1d32sm0l1of_storage($view = null, $data = null)
{

    return hleb_gop0m3f4hpe10d_all($view, $data, "storage");

}

function hleb_to0me1cd6vo7gd_data()
{

    return \hleb\Constructor\Routes\Data::return_data();

}


function hleb_v10s20hdp8nm7c_render($render, $data = null)
{
    if (gettype($render) == "string") {

        $render = [$render];
    }

    return hleb_gop0m3f4hpe10d_all($render, $data, "render");

}


function hleb_search_filenames($dir)
{

    $handle = opendir($dir) or die("Can't open directory $dir");

    $files = Array();

    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {

            if (is_dir($dir . "/" . $file)) {
                $subfiles = hleb_search_filenames($dir . "/" . $file);

                $files = array_merge($files, $subfiles);

            } else {

                $files[] = $dir . "/" . $file;

            }

        }

    }

    closedir($handle);

    return $files;


}

function hleb_c3dccfa0da1a3e_csrf_token()
{

    return \hleb\Constructor\Handlers\ProtectedCSRF::key();
}

function hleb_ds5bol10m0bep2_csrf_field()
{

    return '<input type="hidden" name="_token" value="' . hleb_c3dccfa0da1a3e_csrf_token() . '">';
}


function hleb_ba5c9de48cba78c_redirectToSite($url)
{

    \hleb\Constructor\Handlers\URL::redirectToSite($url);

}

function hleb_ad7371873a6ad40_redirect(string $url, int $code = 303)
{

    \hleb\Constructor\Handlers\URL::redirect($url, $code);

}

function hleb_ba5c9de48cba78c_getProtectUrl($url)
{

    return \hleb\Constructor\Handlers\URL::getProtectUrl($url);

}

function hleb_e0b1036cd5b501_getFullUrl($url)
{

    return \hleb\Constructor\Handlers\URL::getFullUrl($url);

}

function hleb_e2d3aeb0253b7_getMainUrl()
{

    return \hleb\Constructor\Handlers\URL::getMainUrl();

}

function hleb_daa581cdd6323_getMainClearUrl()
{


    return explode("?", hleb_e2d3aeb0253b7_getMainUrl())[0];

}

function hleb_i245eaa1a3b6d_getByName(string $name, array $perem = [])
{

    return \hleb\Constructor\Handlers\URL::getByName($name, $perem);

}

function hleb_a1a3b6di245ea_getStandardUrl(string $name)
{

    return \hleb\Constructor\Handlers\URL::getStandardUrl($name);

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


require HLEB_GLOBAL_DIRECTORY . "/app/opt/shell.php";

\hleb\Main\ProjectLoader::start();

