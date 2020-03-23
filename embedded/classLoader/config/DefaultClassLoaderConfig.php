<?php

class DefaultClassLoaderConfig
{
    public const DEV_MODE = false;
    public const DEBUG_MODE = false;

    private function __construct(){}

    public static function newInstance() : ClassLoaderConfig
    {
        return new ClassLoaderConfig(self::DEV_MODE, self::DEBUG_MODE);
    }
}