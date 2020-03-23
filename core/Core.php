<?php

class Core
{
    use EventDispatcher;

    /**
     * @var Joint[]
     */
    protected $gearJoints = [];

    /**
     * @var Joint[]
     */
    protected $baseJointsBAK = [];

    /**
     * @var Joint[]
     */
    protected $extraJointsBAK = [];

    /**
     * @var Joint[]
     */
    protected $activeExtraJointsBAK = [];

    /**
     * @var Joint[]
     */
    protected $activeBaseJointsBAK = [];

    /**
     * @var Joint[]
     */
    protected $originBaseJointsBAK = [];

    /**
     * @var Joint[]
     */
    protected $originExtraJointsBAK = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $this->gearJoints = (new GearJointsInstaller($this))->getGearJointInstances();
    }

    /**
     * @param string $id
     * @return Joint|null
     */
    public function getJoint(string $id): ?Joint
    {
        return $this->gearJoints[$id];
    }

    /**
     * @param string $id
     * @return Gear|null
     */
    public function getGear(string $id): ?Gear
    {
        return $this->getJoint($id)->getImplementedJoint()->getGear();
    }

    /**
     * @return Joint[]
     */
    public function getBaseJoints(): array
    {
        if (!$this->baseJointsBAK) {
            $this->baseJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => $gearJoint->isBase());
        }

        return $this->baseJointsBAK;
    }

    /**
     * @return Joint[]
     */
    public function getGearJoints(): array
    {
        if (!$this->extraJointsBAK) {
            $this->extraJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => !$gearJoint->isBase());
        }

        return $this->extraJointsBAK;
    }

    /**
     * @return Joint[]
     */
    public function getActiveBaseJoints(): array
    {
        if (!$this->activeBaseJointsBAK) {
            $this->activeBaseJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => $gearJoint->isBase() and $gearJoint->isActive());
        }

        return $this->activeBaseJointsBAK;
    }

    /**
     * @return Joint[]
     */
    public function getActiveExtraJoints(): array
    {
        if (!$this->activeExtraJointsBAK) {
            $this->activeExtraJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => !$gearJoint->isBase() and $gearJoint->isActive());
        }

        return $this->activeExtraJointsBAK;
    }

    /**
     * @return Joint[]
     */
    public function getOriginBaseJoints(): array
    {
        if (!$this->originBaseJointsBAK) {
            $this->originBaseJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => $gearJoint->isBase() and !$gearJoint->getConfig()->getOverrideID());
        }

        return $this->originBaseJointsBAK;
    }

    /**
     * @return Joint[]
     */
    public function getOriginExtraJoints(): array
    {
        if (!$this->originExtraJointsBAK) {
            $this->originExtraJointsBAK = array_filter($this->gearJoints, /** @param Joint $gearJoint @return bool */ fn($gearJoint) => !$gearJoint->isBase() and !$gearJoint->getConfig()->getOverrideID());
        }

        return $this->originExtraJointsBAK;
    }

}