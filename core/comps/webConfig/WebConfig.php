<?php


class WebConfig
{
    /**
     * @var boolean $devMode
     */
    private $devMode;

    /**
     * GearConfig constructor.
     * @param bool $devMode
     */
    public function __construct(bool $devMode)
    {
        $this->devMode = $devMode;
    }

    /**
     * @return bool
     */
    public function isDevMode(): bool
    {
        return $this->devMode;
    }
}