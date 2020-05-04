<?php

namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Response;

class HandlerName implements HandlerInterface
{

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