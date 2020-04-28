<?php
/**
 * This file is executed every time
 * This file can also be used as config file
 *
 */

namespace ServerlessPHP;

define("APP_ROOT", __DIR__);

/**
 * If SHOW_ERRORS = TRUE the api will show error messages if any in response
 * This can be considered similar to turning on ERROR_REPORTING in PHP
 */

define("SHOW_ERRORS", TRUE);

/**
 * You can define your local timezone here as Lambda return GMT time
 * @link https://www.php.net/manual/en/timezones.php
 */

define("APP_TIMEZONE", "Asia/Kolkata");
date_default_timezone_set(APP_TIMEZONE);








