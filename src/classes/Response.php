<?php


namespace ServerlessPHP;

use Bref\Event\Http\HttpResponse;

/**
 * Class Response
 * To respond the request of end user from lambda to API Gateway
 * @package ServerlessPHP
 */
class Response
{
    /**
     * @var array
     */

    private static $headers = [];
    /**
     * @var string
     */
    private $body = "";
    /**
     * @var int
     */
    private $statusCode = 200;

    /**
     * @param string $body Response body to be sent as API Response
     * @param int $statusCode HTTP Status Code of Response
     * @param array $headers Headers to send with response in format ["header1_Name"=> "header1_Value", "header2_Name"=> "header2_Value",... ]
     * @return $this    Instance of the class so that we can use wherever necessary
     */
    public function setResponse(string $body, int $statusCode = 200, array $headers = []): Response
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
        foreach ($headers as $headerName => $headerValue) {
            self::$headers[$headerName] = $headerValue;
        }
        return $this;
    }

    /**
     *
     * @param string $body Response body to be sent as API Response
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * Appends provided header to self::$headers.
     * Multi valued headers are not supported
     * @param string $headerName Name of the header Ex - Content-type
     * @param string $headerValue Value of the header Ex - application/json.
     *
     */
    public function addHeader(string $headerName, string $headerValue): void
    {
        self::$headers[$headerName] = $headerValue;
    }

    /**
     * Sets HTTP status code to sent with API Response
     * @param int $statusCode HTTP Status Code
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     *  Clears all the previous set headers
     */
    public function clearHeaders(): void
    {
        self::$headers = [];
    }

    /**
     * @return array    Returns the set body, headers, and statusCode to API Gateway Format to Respond
     */
    public function toApiGatewayFormat(): array
    {
        $resp = new HttpResponse($this->body, self::$headers, $this->statusCode);
        return $resp->toApiGatewayFormat();
    }
}