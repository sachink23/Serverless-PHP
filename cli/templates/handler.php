<?php

namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Response;

class HandlerName implements HandlerInterface
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
        $response = new Response();
        // Your logic goes here


        return $response;
    }
}