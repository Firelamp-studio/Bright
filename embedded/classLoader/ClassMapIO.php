<?php
namespace Bright;

class ClassMapIO
{
    /**
     * @var string $saveDir
     */
    private string $saveDir;

    public function __construct(string $saveDir)
    {
        $this->saveDir = $saveDir;
    }

    /**
     * @return string
     */
    public function getSaveDir(): string
    {
        return $this->saveDir;
    }

    public function saveClassMapFile(array $classes): void
    {
        $saveDir = $this->saveDir;

        if (file_exists($saveDir))
            unlink($saveDir);

        file_put_contents($saveDir, json_encode($classes));
    }

    public function getClassMapFromFile(): ?array
    {
        if (file_exists($this->saveDir))
            return json_decode(file_get_contents($this->saveDir), true);

        return null;
    }
}