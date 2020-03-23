<?php


class GearConfig
{
    /**
     * @var string
     */
    private $ID;
    /**
     * @var string
     */
    protected $implementationClass;
    /**
     * @var bool
     */
    protected $isBase;
    /**
     * @var string
     */
    private $exposedInterface;
    /**
     * @var string
     */
    private $overrideID;
    /**
     * @var string
     */
    private $coreJointFieldName;
    /**
     * @var string
     */
    private $overriddenJointFieldName;
    /**
     * @var array $joints
     */
    private $joints;

    /**
     * GearConfig constructor.
     * @param string $ID
     * @param string $implementationClass
     * @param bool $isBase
     * @param string $exposedInterface
     * @param string $overrideID
     * @param string $coreJointFieldName
     * @param string $overriddenJointFieldName
     * @param array $joints
     */
    public function __construct(string $ID, string $implementationClass, bool $isBase, string $exposedInterface, string $overrideID, string $coreJointFieldName, string $overriddenJointFieldName, array $joints)
    {
        $this->ID = $ID;
        $this->implementationClass = $implementationClass;
        $this->isBase = $isBase;
        $this->exposedInterface = $exposedInterface;
        $this->overrideID = $overrideID;
        $this->coreJointFieldName = $coreJointFieldName;
        $this->overriddenJointFieldName = $overriddenJointFieldName;
        $this->joints = $joints;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getImplementationClass(): string
    {
        return $this->implementationClass;
    }

    /**
     * @return bool
     */
    public function isBase(): bool
    {
        return $this->isBase;
    }

    /**
     * @return string
     */
    public function getOverrideID(): string
    {
        return $this->overrideID;
    }

    /**
     * @return string
     */
    public function getExposedClass(): string
    {
        return $this->exposedInterface;
    }

    /**
     * @return array
     */
    public function getJoints(): array
    {
        return $this->joints;
    }

    /**
     * @return string
     */
    public function getCoreJointFieldName(): string
    {
        return $this->coreJointFieldName;
    }

    /**
     * @return string
     */
    public function getOverriddenJointFieldName(): string
    {
        return $this->overriddenJointFieldName;
    }
}