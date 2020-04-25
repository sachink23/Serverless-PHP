<?php

namespace ServerlessPHP;
/**
 * Class Request
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
     * @param array $event
     */
    public function set(array $event)
    {
        self::$event = $event;
    }

    /**
     * @return array
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
     * @return array
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
     * @return string
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
     * @return array
     */
    public function getQueryParams(): array
    {
        return self::$event["queryStringParameters"] ?? [];
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return self::$event["headers"] ?? [];
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::$event["requestContext"]["http"]["method"] ?? false;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return (self::$event["rawPath"] ?? self::$event["requestContext"]["http"]["path"]) ?? false;
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        return self::$event["requestContext"]["domainName"] ?? false;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getProtocol(): string
    {
        return self::$event["requestContext"]["http"]["protocol"] ?? false;
    }

    /**
     * @return array
     */

    public function toArray(): array
    {
        return self::$event;
    }

}