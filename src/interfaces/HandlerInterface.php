<?php
namespace ServerlessPHP;

/**
 * Interface HandlerInterface
 * @package ServerlessPHP
 */
interface HandlerInterface
{
    /**
     * Handles Request With your own application logic to return response to API Gateway
     * @return Response
     */
    public function handler(): Response;
}