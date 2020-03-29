<?php
namespace Bright;

class ClassLoaderConfigFactory
{

    public static function newInstance(): ClassLoaderConfig
    {
        $config = BrightData::getConfig()['dev'];
        if ($config) {
            return new ClassLoaderConfig(
                ($config['force_imports_remap'] != null ? $config['force_imports_remap'] : DefaultClassLoaderConfig::FORCE_IMPORTS_REMAP),
                ($config['show_class_loads'] != null ? $config['show_class_loads'] : DefaultClassLoaderConfig::SHOW_CLASS_LOADS)
            );
        }

        return DefaultClassLoaderConfig::newInstance();
    }
}