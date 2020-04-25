<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/main.php';

require_once __DIR__ . '/src/interfaces/HandlerInterface.php';
require_once __DIR__ . '/src/classes/Router.php';
require_once __DIR__ . '/src/classes/Response.php';
require_once __DIR__ . '/src/classes/Request.php';

require_once APP_ROOT . "/src/routes.php";

use ServerlessPHP\Request;
use ServerlessPHP\Response;
use ServerlessPHP\Router;

/**
 * @param $event
 * @return array    ["body"=>string, "statusCode"=>Int, "headers"=>["headerName"=>"headerValue"]]
 */
return function ($event) {

    $request = new Request();
    $request->set($event);
    $response = new Response();
    $response->addHeader("Content-type", "application/json");
    return Router::routeTo($request->getPath())->toApiGatewayFormat();
};
