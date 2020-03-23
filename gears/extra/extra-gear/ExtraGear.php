<?php


class ExtraGear extends Gear implements EventListener
{
    /**
     * @var Lighter $lighter
     */
    public $lighter;

    public function init()
    {
        parent::init();
        $this->lighter->registerListener($this);
    }

    public function onEvent(string $eventName, array $args): void
    {
        //echo "EVENT[{$this->getJoint()->getID()}]: $eventName<br>";
    }
}