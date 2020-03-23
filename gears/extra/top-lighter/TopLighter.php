<?php


class TopLighter extends Lighter implements EventListener
{
    /**
     * @var OverLighter $lighter
     */
    public $lighter;

    public function init()
    {
        parent::init();
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