<?php
namespace Bright;

class GearConfig
{
    /**
     * @var string
     */
    private string $ID;
    /**
     * @var string
     */
    protected string $implementationClass;
    /**
     * @var bool
     */
    protected bool $isBase;
    /**
     * @var string
     */
    private string $exposedInterface;
    /**
     * @var string
     */
    private string $overrideID;
    /**
     * @var string
     */
    private string $coreJointFieldName;
    /**
     * @var string
     */
    private string $overriddenJointFieldName;
    /**
     * @var array $joints
     */
    private array $joints;

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