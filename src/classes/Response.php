<?php


namespace ServerlessPHP;

use Bref\Event\Http\HttpResponse;

class Response
{
    private static $headers = [];
    private static $body = "";
    private static $statusCode = 200;

    public static function setResponse(string $body, int $statusCode = 200, array $headers = []): Response
    {
        self::$body = $body;
        self::$statusCode = $statusCode;
        foreach ($headers as $headerName => $headerValue) {
            self::$headers[$headerName] = $headerValue;
        }
        return new self();
    }

    public function setBody(string $body): void
    {
        self::$body = $body;
    }

    public function addHeader(string $headerName, string $headerValue): void
    {
        self::$headers[$headerName] = $headerValue;
    }

    public function setStatusCode(int $statusCode): void
    {
        self::$statusCode = $statusCode;
    }

    public function clearHeaders(): void
    {
        self::$headers = [];
    }

    public function toApiGatewayFormat(): array
    {
        $resp = new HttpResponse(self::$body, self::$headers, self::$statusCode);
        return $resp->toApiGatewayFormat();
    }
}