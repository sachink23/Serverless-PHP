<?php

class Example1Handler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        return new Response(200,
            json_encode([
                "data_passed" => $_DATA
            ])
        );
    }
}