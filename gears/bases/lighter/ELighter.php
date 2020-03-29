<?php

namespace Bright;

abstract class ELighter implements Base
{
    use EventDispatcher;

    /**
     * @return PageLighter
     */
    public abstract function getPageRender(): PageLighter;

}