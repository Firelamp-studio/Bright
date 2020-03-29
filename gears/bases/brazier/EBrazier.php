<?php

namespace Bright;

abstract class EBrazier implements Base
{
    use EventDispatcher;

    /**
     * @param TargetResult $devTarget
     * @param TargetResult $deployTarget
     * @param PageImplementation $page
     * @return void
     * @throws PageBuildFailedException
     */
    public abstract function burnPage(TargetResult $devTarget, TargetResult $deployTarget, PageImplementation $page): void;
}