<?php


use Leafo\ScssPhp\Compiler;

abstract class AtLinkAgent
{
    /**
     * @var Compiler $scssCompiler
     */
    protected $scssCompiler;

    /**
     * @var callable $globalImportsCallable
     */
    protected $globalImportsCallable;

    /**
     * @var string $linkDir
     */
    protected $linkDir;

    /**
     * @var string $styleFileDeployDir
     */
    protected $styleFileDeployDir;

    /**
     * @var string $scriptFileDeployDir
     */
    protected $scriptFileDeployDir;

    /**
     * AtLinkAgent constructor.
     * @param Compiler $scssCompiler
     * @param callable $globalImportsCallable
     * @param string $linkDir
     * @param string $styleFileDeployDir
     * @param string $scriptFileDeployDir
     */
    public function __construct(?Compiler $scssCompiler, callable $globalImportsCallable, string $linkDir, string $styleFileDeployDir, string $scriptFileDeployDir)
    {
        $this->scssCompiler = $scssCompiler;
        $this->globalImportsCallable = $globalImportsCallable;
        $this->linkDir = $linkDir;
        $this->styleFileDeployDir = $styleFileDeployDir;
        $this->scriptFileDeployDir = $scriptFileDeployDir;
    }

    public abstract function action(string $reference, string $link, array $params = []): ?string;
}