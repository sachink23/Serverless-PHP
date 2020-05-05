<?php
namespace ServerlessPHP;

use Exception;

/**
 * Class Router
 * Manages Routing
 */
class Router
{
    /**
     * @var array   defined static so that routes can be accessed anywhere
     */
    public static $routes = array();
    /**
     * @var string|null
     */
    private static $error = null;

    /**
     * @param array $routes Array of routes
     * @return bool
     */
    public function setRoutes(array $routes)
    {
        foreach ($routes as $route) {
            if (!$this->setRoute($route)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param array $route Array to set single route ["path"=>"string_path", "handler"=>"path/to/HandlerClass"]
     * @return bool True if successfully sets Route else false, and logs error to self::$error
     */
    public function setRoute(array $route)
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
        } else {
            if (!is_array($route["data"])) {
                self::$error = "'data' must be an array in route " . $route["path"];
                return false;
            }
        }
        array_push(self::$routes, $route);
        return true;
    }

    /**
     * @param $path
     * @return Response
     */
    public function routeTo($path): Response
    {
        if (self::$error != null) {
            return $this->showError();
        }
        foreach (self::$routes as $route) {
            if ($path == $route["path"]) {
                try {
                    require_once APP_ROOT . "/src/app/" . $route["handler"] . ".php";
                    $class = "ServerlessPHP\\Handler\\" . basename($route["handler"]);
                    $handler = new $class($route["data"]);
                    return $handler->handler();

                } catch (Exception $e) {
                    self::$error = $e->getMessage();
                    return $this->showError();
                }
            }
        }
        $resp = new Response();
        return $resp->setResponse(
            json_encode([
                "error" => true,
                "data" => [
                    "message" => "Resource Not Found!"
                ]
            ]),
            404,
        );
    }

    /**
     * @return Response If any exception occurs returns 500 Response depending on the set value of SHOW_ERRORS
     */
    private function showError(): Response
    {
        $resp = new Response();
        if (SHOW_ERRORS && self::$error != null) {

            return $resp->setResponse(
                json_encode([
                    "error" => "true",
                    "data" => [
                        "message" => self::$error
                    ]
                ]),
                500,
            );
        } else {
            return $resp->setResponse(
                json_encode([
                    "error" => "true",
                    "data" => [
                        "message" => "Internal Server Error!"
                    ]
                ]),
                500
            );
        }
    }
}