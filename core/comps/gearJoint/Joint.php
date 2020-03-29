<?php
namespace Bright;

abstract class Joint
{
    /**
     * @var Joint
     */
    protected ?Joint $overriderJoint;
    /**
     * @var Gear
     */
    protected ?Gear $gear;
    /**
     * @var bool
     */
    protected bool $enabled;
    /**
     * @var string
     */
    protected string $ID;
    /**
     * @var GearConfig
     */
    protected GearConfig $config;

    /**
     * Joint constructor.
     * @param GearConfig $config
     */
    public function __construct(GearConfig $config)
    {
        $this->config = $config;
        $this->gear = null;
        $this->overriderJoint = null;
        $this->enabled = true;
        $this->ID = $config->getID();
    }

    /**
     * @return Joint
     */
    public function getOverriderJoint(): Joint
    {
        return $this->overriderJoint;
    }

    /**
     * @return bool
     */
    public function isOverridden(): bool
    {
        return isset($this->overriderJoint);
    }

    /**
     * @return Joint
     */
    public function getImplementedJoint(): Joint
    {
        if ($this->overriderJoint)
            return $this->overriderJoint;

        return $this;
    }

    /**
     * @return Gear
     */
    public function getGear(): Gear
    {
        return $this->gear;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return isset($this->gear);
    }

    /**
     * @return bool
     */
    public function isBase() {
        return $this->config->isBase();
    }

    /**
     * @return GearConfig
     */
    public function getConfig(): GearConfig
    {
        return $this->config;
    }
}