<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/main.php';
require_once APP_ROOT . "/src/routes.php";

use ServerlessPHP\Request;
use ServerlessPHP\Response;
use ServerlessPHP\Router;

/**
 * @param $event
 * @return array    ["body"=>string, "statusCode"=>Int, "headers"=>["headerName"=>"headerValue"]]
 */
return function ($event) {

    $router = new Router();
    $request = new Request();
    $response = new Response();

    $request->set($event);
    $response->addHeader("Content-type", "application/json");

    return $router->routeTo($request->getPath())->toApiGatewayFormat();

};
