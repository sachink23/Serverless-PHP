<?php

namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;
use ServerlessPHP\Response;

class DemoHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        $request = new Request();
        $response = new Response();
        $response->setBody(
            json_encode([
                "message" => "DemoHandler",
                "request" => [
                    "queryParams" => $request->getQueryParams(),
                    "postParams" => $request->getPost(),
                    "body" => $request->getBody(),
                    "cookies" => $request->getCookies(),
                    "headers" => $request->getHeaders(),
                    "protocol" => $request->getProtocol(),
                    "method" => $request->getMethod(),
                    "client_ip" => $request->getRemoteIp(),
                    "user_agent" => $request->getUserAgent(),
                    "path" => $request->getPath(),
                ]
            ])
        );
        $response->setStatusCode(200);
        $response->addHeader("Content-type", "application/json");

        return $response;
    }
}