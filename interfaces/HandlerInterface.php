<?php
namespace ServerlessPHP;
interface HandlerInterface
{
    public function handler(array $_DATA): Response;
}