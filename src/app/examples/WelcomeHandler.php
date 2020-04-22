<?php


class WelcomeHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        return new Response(200, json_encode([
            "data" => [
                "message" => "Welcome to ServerlessPHP",
                "description" => "Library based on https://bref.sh/ for building serverless PHP applications on AWS Lambda",
                "github" => "https://github.com/sachink23/ServerlessPHP"
            ]
        ]));
    }
}