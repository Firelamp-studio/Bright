<?php


class BrightData
{
    private function __construct()
    {
    }

    private static $config;

    public static function getConfig()
    {
        if (!self::$config)
            self::$config = parse_ini_file(BASE_DIR . '/bright.ini', true, INI_SCANNER_TYPED);
        return self::$config;
    }

    public static function isDev(): bool
    {
        return !self::getConfig()['specs']['released'];
    }
}