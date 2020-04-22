<?php
namespace ServerlessPHP\Handler;

use Bref\Event\Http\HttpResponse;
use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Request;

class EventHandler implements HandlerInterface
{

    public function handler(array $_DATA): HttpResponse
    {
        $event = Request::get();
        return new HttpResponse(json_encode([
            "event" => $event
        ]));
    }
}