<?php

use Bright\ELighter;
use Bright\EventListener;
use Bright\PageLighter;

class OverLighter extends ELighter implements EventListener
{

    /**
     * @var ELighter $lighter
     */
    public ELighter $lighter;

    public function init()
    {
        $this->lighter->registerListener($this);
    }

    /**
     * @inheritDoc
     */
    function getPageRender(): PageLighter
    {
        //return new PageLighter(new PageImplementation($this,"Over lighter", false), __DIR__ . '/web/over-lighter.php');
        return $this->lighter->getPageRender();
    }

    public function onEvent(string $eventName, array $args): void
    {
        //echo "EVENT[{$this->getJoint()->getID()}]: $eventName<br>";
        $this->dispatchEvent($eventName, $args);
    }
}