<?php
namespace ServerlessPHP;
use Bref\Event\Http\HttpResponse;

interface HandlerInterface
{
    public function handler(array $_DATA): HttpResponse;
}