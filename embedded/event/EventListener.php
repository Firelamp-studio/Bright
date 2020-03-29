<?php
namespace Bright;

interface EventListener
{
    public function onEvent(string $eventName, array $args): void;
}