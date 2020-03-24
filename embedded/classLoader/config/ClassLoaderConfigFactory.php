<?php

class ClassLoaderConfigFactory
{

    public static function newInstance(): ClassLoaderConfig
    {
        $config = Bright::getConfig()['dev'];
        if ($config) {
            return new ClassLoaderConfig(
                ($config['force_page_reload'] != null ? $config['force_page_reload'] : DefaultClassLoaderConfig::FORCE_PAGE_RELOAD),
                ($config['show_class_loads'] != null ? $config['show_class_loads'] : DefaultClassLoaderConfig::SHOW_CLASS_LOADS)
            );
        }

        return DefaultClassLoaderConfig::newInstance();
    }
}