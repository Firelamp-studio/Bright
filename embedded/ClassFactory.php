<?php


namespace Bright;


class ClassFactory
{
    private function __construct()
    {
    }

    public static function newInstance(string $className, ...$constructorParams)
    {
        if (BrightData::isDev()) {
            $pathInfo = pathinfo($className);
            $privateImplementationClass = $pathInfo['dirname'] . DIRECTORY_SEPARATOR . '_' . $pathInfo['basename'];
            if (class_exists($privateImplementationClass))
                return new $privateImplementationClass($constructorParams);
        }

        return new $className;
    }
}