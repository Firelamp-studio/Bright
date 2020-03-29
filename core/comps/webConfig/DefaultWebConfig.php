<?php


class DefaultWebConfig
{
    public const FORCE_PAGE_RELOAD = false;

    public const DEPENDENCIES = [];

    private function __construct(){}

    public static function newInstance() : WebConfig
    {
        return new WebConfig(self::FORCE_PAGE_RELOAD);
    }
}