<?php

class ClassLoaderConfigFactory
{

    public static function newInstance(): ClassLoaderConfig
    {
        $config = Bright::getConfig()['classloader'];
        if ($config) {
            return new ClassLoaderConfig(
                ($config['dev_mode'] != null ? $config['dev_mode'] : DefaultClassLoaderConfig::DEV_MODE),
                ($config['debug_mode'] != null ? $config['debug_mode'] : DefaultClassLoaderConfig::DEBUG_MODE)
            );
        }

        return DefaultClassLoaderConfig::newInstance();
    }
}