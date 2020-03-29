<?php
namespace Bright;

class WebConfig
{
    /**
     * @var boolean $forcePageReload
     */
    private bool $forcePageReload;

    /**
     * GearConfig constructor.
     * @param bool $forcePageReload
     */
    public function __construct(bool $forcePageReload)
    {
        $this->forcePageReload = $forcePageReload;
    }

    /**
     * @return bool
     */
    public function forcePageReload(): bool
    {
        return $this->forcePageReload;
    }
}