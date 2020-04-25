<?php

use ServerlessPHP\Router;

Router::setRoutes([
    [
        "path" => "/demo",
        "handler" => "DemoHandler"
    ]
]);

