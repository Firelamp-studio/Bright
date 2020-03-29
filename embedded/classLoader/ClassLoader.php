<?php
namespace Bright;

class ClassLoader
{
    /**
     * @var array $classes
     */
    private array $classes;

    /**
     * @var bool $showClassLoads
     */
    private bool $showClassLoads;

    public function __construct(bool $showClassLoads)
    {
        $this->classes = [];
        $this->showClassLoads = $showClassLoads;
    }

    /**
     * @param array $classes
     */
    public function setClasses(array $classes): void
    {
        $this->classes = $classes;
    }

    /**
     * Register all class files
     */
    public function registerAllAnalyzingBright(): void
    {
        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(BASE_DIR, \FilesystemIterator::SKIP_DOTS)) as $filename) {
            if (pathinfo($filename, PATHINFO_EXTENSION) == 'php') {
                $className = ClassAnalyzer::getClassNameFromFile($filename);
                if ($className)
                    $this->classes[$className] = $filename->getPathname();
            }
        }
    }

    /**
     * Includes utilized class files when needed
     */
    public function start(): void
    {
        spl_autoload_register(function ($class) {

            if ($this->showClassLoads) {
                echo "<pre>[{$class}] => {$this->classes[$class]}</pre>";
            }

            if (isset($this->classes[$class])) {
                require $this->classes[$class];
            }
        });
    }

    /**
     * @return array
     */
    public function getClasses(): array
    {
        return $this->classes;
    }
}