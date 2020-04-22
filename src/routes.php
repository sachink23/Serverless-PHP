<?php

use ServerlessPHP\Router;

Router::set_routes([
    [
        "path" => "/",
        "handler" => "examples/WelcomeHandler"
    ],
    [
        "path" => "/example1",
        "handler" => "examples/Example1Handler",
        "data" => [
            "field" => "some_value"
        ]
    ],
    [
        "path" => "/examples/example2",
        "handler" => "examples/Example2Handler"
    ],
    [
        "path" => "/event",
        "handler" => "examples/EventHandler"
    ]
]);

