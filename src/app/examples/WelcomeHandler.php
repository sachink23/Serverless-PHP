<?php
namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Response;

class WelcomeHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        return new Response(200, json_encode([
            "data" => [
                "message" => "Welcome to Serverless-PHP",
                "description" => "Framework based on https://bref.sh/ for building serverless PHP applications on AWS Lambda",
                "github" => "https://github.com/sachink23/ServerlessPHP",
                "documentation" => "https://serverless-php.sachink.com"
            ]
        ]));
    }
}