<?php
namespace ServerlessPHP\Handler;

use Bref\Event\Http\HttpResponse;
use ServerlessPHP\HandlerInterface;

class Example1Handler implements HandlerInterface
{

    public function handler(array $_DATA): HttpResponse
    {
        return new HttpResponse(json_encode([
            "data_passed" => $_DATA
        ]));
    }
}