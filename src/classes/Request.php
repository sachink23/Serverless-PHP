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
     * @param array $event
     */
    public static function set(array $event): void
    {
        self::$event = $event;
    }

    /**
     * @return array
     */
    public static function get(): array
    {
        return self::$event;
    }

    public function get_headers(): array
    {
        return self::$event["headers"] ?? [];
    }

    public function get_cookies(): array
    {
        return self::$event["headers"] ?? [];
    }

    public function get_query_params(): array
    {
        return self::$event["queryStringParameters"] ?? [];
    }

    public function get_method(): string
    {
        return self::$event["http"]["method"] ?? false;
    }

    public function get_remote_addr(): string
    {
        return self::$event["http"]["sourceIp"] ?? false;
    }

    public function get_user_agent(): string
    {
        return self::$event["http"]["userAgent"] ?? false;
    }

    public function get_protocol(): string
    {
        return self::$event["http"]["protocol"] ?? false;
    }

    public function get_body(): string
    {
        // TODO: Implement decoding post requests and files using https://symfony.com/doc/current/introduction/http_fundamentals.html#requests-and-responses-in-symfony

        return self::$event["body"] ?? false;

    }

}