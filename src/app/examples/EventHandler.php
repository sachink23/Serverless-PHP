<?php
namespace ServerlessPHP\Handler;

use Bref\Event\Http\HttpResponse;
use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;

class EventHandler implements HandlerInterface
{

    public function handler(array $_DATA): HttpResponse
    {
        $request = new Request();
        return new HttpResponse(json_encode([
            "REQUEST" => [
                "GET" => $request->getQueryParams(),
                "POST" => $request->getPost(),
                "Body" => $request->getBody(),
                "Cookies" => $request->getCookies(),
                "Headers" => $request->getHeaders(),
                "Protocol" => $request->getProtocol(),
                "Method" => $request->getMethod(),
                "Client IP" => $request->getRemoteIp(),
                "User Agent" => $request->getUserAgent(),
                "Path" => $request->getPath(),
            ]
        ]), ["Content-type" => "application/json"]);
    }
}