<?php


class DefaultWebConfig
{
    public const DEV_MODE = false;

    public const DEPENDENCIES = [];

    private function __construct(){}

    public static function newInstance() : WebConfig
    {
        return new WebConfig(self::DEV_MODE);
    }
}