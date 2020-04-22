<?php
namespace ServerlessPHP\Handler;

use Bref\Event\Http\HttpResponse;
use ServerlessPHP\HandlerInterface;

class Example2Handler implements HandlerInterface
{

    public function handler(array $_DATA): HttpResponse
    {
        return new HttpResponse(json_encode([
            "message" => "This is example 2"
        ]));
    }
}