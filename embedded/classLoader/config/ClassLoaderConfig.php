<?php

class ClassLoaderConfig
{
    /**
     * @var bool $useClassMap
     */
    private $useClassMap;

    /**
     * @var bool $debugMode
     */
    private $debugMode;

    public function __construct(bool $useClassMap, bool $debugMode)
    {
        $this->useClassMap = $useClassMap;
        $this->debugMode = $debugMode;
    }

    /**
     * @return bool
     */
    public function devModeEnabled(): bool
    {
        return $this->useClassMap;
    }

    /**
     * @return bool
     */
    public function debugModeEnabled(): bool
    {
        return $this->debugMode;
    }


}