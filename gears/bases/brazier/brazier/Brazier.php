<?php


abstract class Brazier extends Base
{
    /**
     * @param TargetResult $devTarget
     * @param TargetResult $deployTarget
     * @param PageImplementation $page
     * @return void
     * @throws PageBuildFailedException
     */
    public abstract function burnPage(TargetResult $devTarget, TargetResult $deployTarget, PageImplementation $page): void;
}