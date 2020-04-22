<?php
namespace ServerlessPHP\Handler;

use Bref\Event\Http\HttpResponse;
use ServerlessPHP\HandlerInterface;

class WelcomeHandler implements HandlerInterface
{

    public function handler(array $_DATA): HttpResponse
    {
        return new HttpResponse(json_encode([
            "data" => [
                "message" => "Welcome to Serverless-PHP",
                "description" => "Framework based on https://bref.sh/ for building serverless PHP applications on AWS Lambda",
                "github" => "https://github.com/sachink23/ServerlessPHP",
                "documentation" => "https://serverless-php.sachink.com",
                "php_version" => phpversion()
            ]
        ]));
    }
}