<?php

abstract class Gear
{
    use EventDispatcher;

    /**
     * @var Joint
     */
    private $joint;

    /**
     * Gear constructor.
     * @param Joint $joint
     */
    public function __construct(Joint $joint)
    {
        $this->joint = $joint;
    }

    /**
     * @return Joint
     */
    public final function getJoint(): Joint
    {
        return $this->joint;
    }

    public function init(){
        //echo "INIT[{$this->getJoint()->getID()}]<br>";
    }
}