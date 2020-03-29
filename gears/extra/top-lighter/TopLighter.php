<?php


use Bright\ELighter;
use Bright\EventListener;
use Bright\PageLighter;

class TopLighter extends ELighter implements EventListener
{
    /**
     * @var OverLighter $lighter
     */
    public OverLighter $lighter;

    public function init()
    {
        $this->lighter->registerListener($this);
    }

    /**
     * @inheritDoc
     */
    function getPageRender(): PageLighter
    {
        return $this->lighter->getPageRender();
        //return new PageLighter(new PageImplementation($this, "Top lighter", false), __DIR__ . '/web/top-lighter.php');
    }

    public function onEvent(string $eventName, array $args): void
    {
        //echo "EVENT[{$this->getJoint()->getID()}]: $eventName<br>";
        $this->dispatchEvent($eventName, $args);
    }
}