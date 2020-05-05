<?php
namespace ServerlessPHP;

/**
 * Interface HandlerInterface
 * @package ServerlessPHP
 */
interface HandlerInterface
{
    /**
     * HandlerInterface constructor.
     * @param array $_DATA This is an array $route["data"]
     */
    public function __construct(array $_DATA);

    /**
     * Handles Request With your own application logic to return response to API Gateway
     * @return Response
     */
    public function handler(): Response;
}