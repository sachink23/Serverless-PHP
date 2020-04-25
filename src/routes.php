<?php

use ServerlessPHP\Router;

Router::setRoutes([
    [
        "path" => "/event",
        "handler" => "examples/EventHandler"
    ]
]);

