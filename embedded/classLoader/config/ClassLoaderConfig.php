<?php

class ClassLoaderConfig
{
    /**
     * @var bool $forceClassRemap
     */
    private $forceClassRemap;

    /**
     * @var bool $showClassLoads
     */
    private $showClassLoads;

    public function __construct(bool $forceClassRemap, bool $showClassLoads)
    {
        $this->forceClassRemap = $forceClassRemap;
        $this->showClassLoads = $showClassLoads;
    }

    /**
     * @return bool
     */
    public function forceClassRemap(): bool
    {
        return $this->forceClassRemap;
    }

    /**
     * @return bool
     */
    public function showClassLoads(): bool
    {
        return $this->showClassLoads;
    }


}