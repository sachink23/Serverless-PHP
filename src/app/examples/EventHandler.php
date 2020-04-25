<?php
namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;
use ServerlessPHP\Response;

class EventHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        $request = new Request();
        $response = new Response();
        $response->setBody(
            json_encode([
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
            ])
        );
        $response->setStatusCode(200);
        $response->addHeader("Content-type", "application/json");

        return $response;
    }
}