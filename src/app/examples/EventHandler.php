<?php
/**
 * Copyright (c) 2020.
 * Author: Sachin Kekarjawalekar
 * This example shows how to access event data passed by api gateway to the lambda
 */

class EventHandler implements HandlerInterface
{

    public function handler(array $_DATA): Response
    {
        $event = Request::get();
        return new Response(200, json_encode([
            "event" => $event
        ]));
    }
}