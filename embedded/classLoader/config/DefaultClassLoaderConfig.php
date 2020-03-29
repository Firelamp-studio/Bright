<?php
namespace Bright;

class DefaultClassLoaderConfig
{
    public const FORCE_IMPORTS_REMAP = false;
    public const SHOW_CLASS_LOADS = false;

    private function __construct(){}

    public static function newInstance() : ClassLoaderConfig
    {
        return new ClassLoaderConfig(self::FORCE_IMPORTS_REMAP, self::SHOW_CLASS_LOADS);
    }
}