<?php

require 'Bright.php';
require EMBEDDED_DIR . '/classLoader/config/ClassLoaderConfigFactory.php';
require EMBEDDED_DIR . '/classLoader/config/ClassLoaderConfig.php';
require EMBEDDED_DIR . '/classLoader/config/DefaultClassLoaderConfig.php';
require EMBEDDED_DIR . '/classLoader/ClassMapIO.php';
require EMBEDDED_DIR . '/classLoader/ClassLoader.php';
require EMBEDDED_DIR . '/classLoader/ClassAnalyzer.php';

$classMapDir = BASE_DIR . '/class-map.json';
$classMapIO = new ClassMapIO($classMapDir);

$classLoaderConfig = ClassLoaderConfigFactory::newInstance();

$classLoader = new ClassLoader($classLoaderConfig->debugModeEnabled());

if ($classLoaderConfig->devModeEnabled()) {

    $classLoader->registerAllAnalyzingBright();
    $classMapIO->saveClassMapFile($classLoader->getClasses());

} else {

    $classMap = $classMapIO->getClassMapFromFile();

    if ($classMap == null) {
        $classLoader->registerAllAnalyzingBright();
        $classMapIO->saveClassMapFile($classLoader->getClasses());
    } else {
        $classLoader->setClasses($classMap);
    }
}

$classLoader->start();