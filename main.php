<?php
/**
 * This file is executed every time after the required classes are loaded.
 * You can specify constants or global codes!
 *
 */

namespace ServerlessPHP;

define("APP_ROOT", __DIR__);

define("APP_TIMEZONE", "Asia/Kolkata");

// If SHOW_ERRORS = TRUE the api will show error messages if any in response
define("SHOW_ERRORS", TRUE);

date_default_timezone_set(APP_TIMEZONE);








