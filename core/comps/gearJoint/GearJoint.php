<?php


class GearJoint extends Joint
{
    /**
     * @return Gear
     */
    public function procureGear(): Gear
    {
        if (!$this->gear) {
            $gearImplementationClass = $this->config->getImplementationClass();
            $this->gear = new $gearImplementationClass($this);
        }

        return $this->gear;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @param Joint $overriderJoint
     */
    public function setOverriderJoint(Joint $overriderJoint): void
    {
        $this->overriderJoint = $overriderJoint;
    }
}