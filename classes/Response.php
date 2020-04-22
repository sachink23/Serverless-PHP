<?php
namespace ServerlessPHP;
/**
 * Class Response
 */
class Response
{
    /**
     * @var int
     */
    /**
     * @var string|null
     */
    public $statusCode = 0, $body = null, $headers = [];

    /**
     * @param int $statusCode
     * @param string $body
     */
    function __construct(int $statusCode, string $body, array $headers = array())
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
        $this->headers = $headers;
    }

}