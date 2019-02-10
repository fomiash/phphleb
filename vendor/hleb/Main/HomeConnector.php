<?php

class HomeConnector implements Connector
{
    function __construct(){}
     /**
     *  Добавление пути для автозагрузки класса: namespace => realpath
     */
    public function add()
    {

        return [

            "MainController" => "vendor/hleb/Scheme/App/Controllers/MainController.php",
            "MainMiddleware" => "vendor/hleb/Scheme/App/Middleware/MainMiddleware.php",
            "MainModel" => "vendor/hleb/Scheme/App/Models/MainModel.php",
            "Request" => "vendor/hleb/Constructor/Handlers/Request.php",
            "Route" => "vendor/hleb/Constructor/Routes/Route.php",

            "hleb\Constructor\Handlers\URL" => "vendor/hleb/Constructor/Handlers/URL.php",
            "hleb\Constructor\Handlers\Key" => "vendor/hleb/Constructor/Handlers/Key.php",
            "hleb\Main\ProjectLoader" => "vendor/hleb/Main/ProjectLoader.php",
            "DeterminantStaticUncreated" => "vendor/hleb/Main/Insert/DeterminantStaticUncreated.php",
            "hleb\Constructor\Cache\CacheRoutes" => "vendor/hleb/Constructor/Cache/CacheRoutes.php",
            "hleb\Constructor\Routes\LoadRoutes" => "vendor/hleb/Constructor/Routes/LoadRoutes.php",
            "hleb\Constructor\Routes\MainRoute" => "vendor/hleb/Constructor/Routes/MainRoute.php",
            "hleb\Scheme\Home\Constructor\Routes\StandardRoute" => "vendor/hleb/Scheme/Home/Constructor/Routes/StandardRoute.php",
            "hleb\Constructor\Routes\Methods\RouteMethodPrefix" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodPrefix.php",
            "hleb\Constructor\Routes\MainRouteMethod" => "vendor/hleb/Constructor/Routes/MainRouteMethod.php",
            "hleb\Scheme\Home\Constructor\Routes\DataRoute" => "vendor/hleb/Scheme/Home/Constructor/Routes/DataRoute.php",
            "hleb\Scheme\Home\Constructor\Routes\RouteMethodStandard" => "vendor/hleb/Scheme/Home/Constructor/Routes/RouteMethodStandard.php",
            "hleb\Constructor\Routes\Methods\RouteMethodGet" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodGet.php",
            "hleb\Constructor\Routes\Methods\RouteMethodWhere" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodWhere.php",
            "hleb\Constructor\Routes\Methods\RouteMethodRenderMap" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodRenderMap.php",
            "hleb\Constructor\Routes\Methods\RouteMethodGetProtect" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodGetProtect.php",
            "hleb\Constructor\Routes\Methods\RouteMethodEndProtect" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodEndProtect.php",
            "hleb\Constructor\Routes\Methods\RouteMethodGetType" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodGetType.php",
            "hleb\Constructor\Routes\Methods\RouteMethodEndType" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodEndType.php",
            "hleb\Constructor\Routes\Methods\RouteMethodGetGroup" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodGetGroup.php",
            "hleb\Constructor\Routes\Methods\RouteMethodEndGroup" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodEndGroup.php",
            "hleb\Constructor\Routes\Methods\RouteMethodProtect" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodProtect.php",
            "hleb\Constructor\Routes\Methods\RouteMethodType" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodType.php",
            "hleb\Constructor\Routes\Methods\RouteMethodName" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodName.php",
            "hleb\Constructor\Routes\Methods\RouteMethodBefore" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodBefore.php",
            "hleb\Constructor\Routes\Methods\RouteMethodAfter" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodAfter.php",
            "hleb\Constructor\Routes\Methods\RouteMethodController" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodController.php",
            "hleb\Constructor\Routes\Methods\RouteMethodEnd" => "vendor/hleb/Constructor/Routes/Methods/RouteMethodEnd.php",
            "hleb\Main\Errors\ErrorOutput" => "vendor/hleb/Main/Errors/ErrorOutput.php",
            "hleb\Constructor\Handlers\URLHandler" => "vendor/hleb/Constructor/Handlers/URLHandler.php",
            "hleb\Main\Functions" => "vendor/hleb/Main/Functions.php",
            "hleb\Constructor\Handlers\ProtectedCSRF" => "vendor/hleb/Constructor/Handlers/ProtectedCSRF.php",
            "hleb\Constructor\Workspace" => "vendor/hleb/Constructor/Workspace.php",
            "hleb\Constructor\Routes\Data" => "vendor/hleb/Constructor/Routes/Data.php",

        ];

    }

}