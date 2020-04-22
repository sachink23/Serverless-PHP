<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/main.php';

require_once __DIR__ . '/interfaces/HandlerInterface.php';
require_once __DIR__ . '/classes/Router.php';
require_once __DIR__ . '/classes/Request.php';
require_once __DIR__ . '/classes/Response.php';

require_once APP_ROOT . "/src/routes.php";

/**
 * @param $event
 * @return Response
 */
return function ($event) {
    Request::set($event);
    return Router::route_to($event["rawPath"]);
};