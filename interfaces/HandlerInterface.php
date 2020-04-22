<?php

interface HandlerInterface
{
    public function handler(array $_DATA): Response;
}