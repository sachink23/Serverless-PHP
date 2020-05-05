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
        "handler" => "DemoHandler",
        "data" => [
            "some_key" => "some_value",
            "some_another_key" => "some_another_value"
        ]
    ]
]);

