<?php
namespace Bright;

use ReflectionClass;
use ReflectionException;

trait EventDispatcher
{
    /**
     * @var EventListener[]
     */
    private array $listeners = [];

    /**
     * @param EventListener $listener
     */
    public final function registerListener(EventListener $listener): void
    {
        $this->listeners[] = $listener;
    }


    public final function removeListener(EventListener $listener): void
    {
        unset($this->listeners[array_search($listener, $this->listeners)]);
    }

    /**
     * @param string $eventName
     * @param array $args
     */
    protected final function dispatchEvent(string $eventName, array $args): void
    {
        foreach ($this->listeners as $listener) {
            $listener->onEvent($eventName, $args);

            try {
                $method = (new ReflectionClass($listener))->getMethod($eventName);
                if ($method) {
                    $method->invokeArgs($listener, $args);
                }
            } catch (ReflectionException $e) {
            }
        }
    }


}