<?php

abstract class Lighter extends Base
{
    /**
     * @return PageLighter
     */
    public abstract function getPageRender(): PageLighter;
}