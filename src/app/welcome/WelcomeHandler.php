<?php


namespace ServerlessPHP\Handler;

use ServerlessPHP\HandlerInterface;
use ServerlessPHP\Response;

class WelcomeHandler implements HandlerInterface
{

    /**
     * @inheritDoc
     */
    public function handler(): Response
    {
        $response = new Response();
        $body = json_encode([
            "message" => "Serverless-PHP Welcome's You!",
            "github" => "https://github.com/sachink23/serverless-php",
            "docs" => "https://serverless-php.sachink.com",
            "author" => "https://www.linkedin.com/in/sachin-kekarjawalekar-755914b5/",
            "demo" => "https://serverless-php-api.sachink.com/demo"
        ]);

        $response->addHeader("x-powered-by", "Serverless-PHP");

        return $response->setResponse($body, 200);
    }
}