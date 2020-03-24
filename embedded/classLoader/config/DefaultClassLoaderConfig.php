<?php

class DefaultClassLoaderConfig
{
    public const FORCE_PAGE_RELOAD = false;
    public const SHOW_CLASS_LOADS = false;

    private function __construct(){}

    public static function newInstance() : ClassLoaderConfig
    {
        return new ClassLoaderConfig(self::FORCE_PAGE_RELOAD, self::SHOW_CLASS_LOADS);
    }
}