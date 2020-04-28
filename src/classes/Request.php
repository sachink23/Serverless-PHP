<?php

namespace ServerlessPHP;
/**
 * Class Request
 * To handle the request sent by the end user to application through API Gateway
 */
class Request
{
    /**
     * @var array
     */
    private static $event = [];

    /**
     * @var string
     */
    private static $body;

    /**
     * @var array
     */
    private static $postParams;

    /**
     * @var
     */
    private static $cookies;


    /**
     * Sets API Gateway Proxy Event
     * @param array $event Array received from API Gateway
     * @link https://github.com/awsdocs/aws-lambda-developer-guide/blob/master/sample-apps/nodejs-apig/event.json
     */
    public function set(array $event)
    {
        self::$event = $event;
    }

    /**
     * @return array    Cookies received in the request
     */
    public function getCookies(): array
    {
        if (!isset(self::$cookies)) {
            $cookies = self::$event["cookies"] ?? [];
            self::$cookies = [];
            foreach ($cookies as $cookie) {
                $tmp = [];
                parse_str($cookie, $tmp);
                self::$cookies[] = $tmp;
            }
        }
        return self::$cookies;
    }

    /**
     * Currently doesn't support multipart-form-data
     * @return array    Parameters posted in the request if they are posted as content-type: x-www-form-urlencoded or text
     * ["param_name", "value"]
     */
    public function getPost(): array
    {
        if (!isset(self::$postParams)) {
            self::$postParams = [];
            parse_str(self::getBody(), self::$postParams);
        }
        return self::$postParams;
    }

    /**
     * @return string   RAW Request body
     */
    public function getBody(): string
    {
        if (isset(self::$body)) {
            return self::$body;
        }
        if (!array_key_exists("body", self::$event)) {
            return self::$body = "";
        }
        if (self::$event["isBase64Encoded"]) {
            return self::$body = base64_decode(self::$event["body"]);
        } else {
            return self::$body = self::$event["body"];
        }
    }

    /**
     * @return array    Array of query parameters sent with url ["param_name", "value"]
     */
    public function getQueryParams(): array
    {
        return self::$event["queryStringParameters"] ?? [];
    }

    /**
     * @return array    Request Headers ["header_name1"=>"header_value1", ....]
     */
    public function getHeaders(): array
    {
        return self::$event["headers"] ?? [];
    }

    /**
     * @return string   Request Method
     */
    public function getMethod(): string
    {
        return self::$event["requestContext"]["http"]["method"] ?? false;
    }

    /**
     * @return string   Request URI/Path
     */
    public function getPath(): string
    {
        return (self::$event["rawPath"] ?? self::$event["requestContext"]["http"]["path"]) ?? false;
    }

    /**
     * @return string   Request Hostname
     */
    public function getHostName(): string
    {
        return self::$event["requestContext"]["domainName"] ?? false;
    }

    /**
     * @return string   User Agent
     */
    public function getUserAgent(): string
    {
        return self::$event["requestContext"]["http"]["userAgent"] ?? false;
    }

    /**
     * @return string
     */
    public function getRemoteIp(): string
    {
        return self::$event["requestContext"]["http"]["sourceIp"] ?? false;
    }

    /**
     * @return string   Request Protocol
     */
    public function getProtocol(): string
    {
        return self::$event["requestContext"]["http"]["protocol"] ?? false;
    }

    /**
     * @return array    Array received from API Gateway
     * @link https://github.com/awsdocs/aws-lambda-developer-guide/blob/master/sample-apps/nodejs-apig/event.json
     */

    public function toArray(): array
    {
        return self::$event;
    }

}