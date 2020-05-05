<?php

namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;
use ServerlessPHP\Response;

class DemoHandler implements HandlerInterface
{
    /**
     * @var array   This is an array from $route["data"]
     */
    private $r_data;

    /**
     * @inheritDoc
     */
    public function __construct(array $_DATA)
    {
        $this->r_data = $_DATA;
    }

    /**
     * @inheritDoc
     */
    public function handler(): Response
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
                    "data" => $this->r_data
                ]
            ])
        );
        $response->setStatusCode(200);

        return $response;
    }
}