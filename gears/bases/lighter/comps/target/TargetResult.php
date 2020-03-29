<?php

namespace Bright;

class TargetResult
{
    /**
     * @var string $path
     */
    private string $path;

    /**
     * @var string $target
     */
    private string $target;

    /**
     * @var string $targetType
     */
    private string $targetType;

    /**
     * TargetResult constructor.
     * @param string $path
     * @param string $target
     * @param string $targetType
     */
    public function __construct(string $path, string $target, string $targetType)
    {
        $this->path = $path;
        $this->target = $target;
        $this->targetType = $targetType;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getTargetType(): string
    {
        return $this->targetType;
    }

    public function __toString()
    {
        return "TargetResult:{ path:'{$this->path}', target:'{$this->target}', targetType:'{$this->targetType}' }";
    }


}