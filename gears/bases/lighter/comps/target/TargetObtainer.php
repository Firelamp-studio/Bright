<?php

namespace Bright;

abstract class TargetObtainer
{
    public const GEAR_REQUEST = "gear";
    public const BASEMOUNT_REQUEST = "base";
    public const CORE_REQUEST = "";
    public const DRAFT_REQUEST = "draft";

    /**
     * @var array $pathParts
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = trim($path, '/');
    }

    public function getTarget(): TargetResult
    {
        $pathParts = $this->path ? explode('/', $this->path) : [];
        $pathSize = sizeof($pathParts);

        if (isset($_GET['draft']) and $_GET['draft'] == 'on') {
            return $this->getTargetResult($this->path, self::DRAFT_REQUEST, $pathSize == 0);
        }

        if ($pathSize >= 2) {
            if ($pathParts[0] == self::GEAR_REQUEST) {
                return $this->getTargetResult($this->path, self::GEAR_REQUEST, $pathSize == 2);
            } else if ($pathParts[0] == self::BASEMOUNT_REQUEST) {
                return $this->getTargetResult($this->path, self::BASEMOUNT_REQUEST, $pathSize == 2);
            }
        }

        return $this->getTargetResult($this->path, self::CORE_REQUEST, $pathSize == 0);
    }

    public abstract function getTargetResult(string $path, string $requestType, bool $is_default): TargetResult;
}