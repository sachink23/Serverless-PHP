<?php
namespace ServerlessPHP;

use Bref\Event\Http\HttpResponse;
use Exception;

/**
 * Class Router
 */
class Router
{
    /**
     * @var array
     */
    public static $routes = array();
    /**
     * @var string|null
     */
    private static $error = null;

    /**
     * @param array $routes
     * @return bool
     */
    public static function set_routes(array $routes)
    {
        foreach ($routes as $route) {
            if (!self::set_route($route)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param array $route
     * @return bool
     */
    public static function set_route(array $route)
    {
        if (array_key_exists("path", $route)) {
            foreach (self::$routes as $rt) {
                if ($rt["path"] == $route["path"]) {
                    self::$error = "Route " . $rt["path"] . " Already Exists";
                    return false;
                }
            }
        } else {
            self::$error = "Route Path Not Set For A Route!";
            return false;
        }
        if (array_key_exists("handler", $route)) {
            if (!file_exists(APP_ROOT . "/src/app/" . $route["handler"] . ".php")) {
                self::$error = APP_ROOT . "/src/app/" . $route["handler"] . ".php" . " Not Found For " . $route["path"];
                return false;
            }
        } else {
            self::$error = "Route Path Not Set For A Route " . $route["path"];
            return false;
        }
        if (!array_key_exists("data", $route)) {
            $route["data"] = array();
        }
        array_push(self::$routes, $route);
        return true;
    }

    /**
     * @param $path
     * @return HttpResponse
     */
    public static function route_to($path): HttpResponse
    {
        if (self::$error != null) {
            return self::show_error();
        }
        foreach (self::$routes as $route) {
            if ($path == $route["path"]) {
                try {
                    require_once APP_ROOT . "/src/app/" . $route["handler"] . ".php";
                    $class = "ServerlessPHP\\Handler\\" . basename($route["handler"]);
                    $handler = new $class();
                    return $handler->handler($route["data"]);

                } catch (Exception $e) {
                    self::$error = $e->getMessage();
                    return self::show_error();
                }
            }
        }
        return new HttpResponse(
            json_encode([
                "error" => true,
                "data" => [
                    "message" => "Resource Not Found!"
                ]
            ]),
            [],
            404
        );
    }

    /**
     * @return HttpResponse
     */
    private static function show_error(): HttpResponse
    {
        if (SHOW_ERRORS && self::$error != null) {
            return new HttpResponse(
                json_encode([
                    "error" => "true",
                    "data" => [
                        "message" => self::$error
                    ]
                ]),
                [],
                500
            );
        } else {
            return new HttpResponse(
                json_encode([
                    "error" => "true",
                    "data" => [
                        "message" => "Internal Server Error!"
                    ]
                ]),
                [],
                500
            );
        }
    }
}