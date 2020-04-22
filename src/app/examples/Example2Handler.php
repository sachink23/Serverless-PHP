<?php

class Example2Handler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        return new Response(200,
            json_encode([
                "message" => "This is example 2"
            ])
        );
    }
}