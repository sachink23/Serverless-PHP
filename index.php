<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/main.php';

require_once __DIR__ . '/src/interfaces/HandlerInterface.php';
require_once __DIR__ . '/src/classes/Router.php';
require_once __DIR__ . '/src/classes/Request.php';

require_once APP_ROOT . "/src/routes.php";

use ServerlessPHP\Request;
use ServerlessPHP\Router;

/**
 * @param $event
 * @return array
 */
return function ($event) {
    $request = new Request();
    $request->set($event);
    return Router::routeTo($request->getPath())->toApiGatewayFormat();
};
