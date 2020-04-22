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

}