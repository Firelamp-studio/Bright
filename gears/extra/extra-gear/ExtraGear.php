<?php

use Bright\ELighter;
use Bright\EventListener;
use Bright\Gear;

class ExtraGear implements Gear, EventListener
{
    public ELighter $lighter;

    public function init()
    {
        $this->lighter->registerListener($this);
    }

    public function onEvent(string $eventName, array $args): void
    {
        //echo "EVENT[{$this->getJoint()->getID()}]: $eventName<br>";
    }
}