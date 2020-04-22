<?php
namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;
use ServerlessPHP\Response;

class EventHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        $event = Request::get();
        return new Response(200, json_encode([
            "event" => $event
        ]));
    }
}