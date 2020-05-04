<?php
/**
 * Set your application routes here
 * @example
 * $route = [
 *              "path" => "http_path" // Case sensitive,
 *              "handler" => "path/to/HandlerClass" // - Path inside src/app/ - Dont Include .php extension
 *          ]
 */

use ServerlessPHP\Router;

$router = new Router();

$router->setRoutes([
    [
        "path" => "/",
        "handler" => "welcome/WelcomeHandler"
    ],
    [
        "path" => "/demo",
        "handler" => "DemoHandler"
    ]
]);

