<?php

use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Exception\CompilerException;

class ParamsAtLinkAgent extends AtLinkAgent
{
    private $bases;
    private $gears;

    public function __construct(Compiler $scssCompiler, callable $globalImportsCallable, string $linkDir, string $styleFileDeployDir, string $scriptFileDeployDir, array $bases, array $gears)
    {
        $this->bases = $bases;
        $this->gears = $gears;
        parent::__construct($scssCompiler, $globalImportsCallable, $linkDir, $styleFileDeployDir, $scriptFileDeployDir);
    }

    public function action(string $reference, string $link, array $params = []): ?string
    {
        $linkDir = $this->getRelativePath($reference, $link);

        if ($linkDir != null) {

            $linkStyleDir = $linkDir . "styles/{$link}.scss";
            if (file_exists($linkStyleDir)) {
                $this->scssCompiler->setImportPaths($linkDir . 'styles');
                $this->scssCompiler->addImportPath($this->globalImportsCallable);
                try {
                    file_put_contents($this->styleFileDeployDir, $this->scssCompiler->compile(file_get_contents($linkStyleDir), $linkDir . 'styles'), FILE_APPEND);
                } catch (CompilerException $ex) {
                    echo "<pre>SCSS Compiler Throws Exception in AtLink:{{$ex->getMessage()}}</pre>";
                    die;
                }
            }

            $linkScriptDir = $linkDir . "scripts/{$link}.js";
            if (file_exists($linkScriptDir)) {
                file_put_contents($this->scriptFileDeployDir, file_get_contents($linkScriptDir), FILE_APPEND);
            }

            $linkContentDir = $linkDir . "{$link}.php";
            $linkContent = '';
            if (file_exists($linkContentDir)) {
                $linkContent = file_get_contents($linkContentDir);

                $linkContent = (new AtLinkParamsParser($linkContent))->parse(new AtLinkParamsAgent($params));
            }

            return $linkContent;
        }

        return null;
    }

    private function getRelativePath(string $reference, string $link): ?string
    {

        if (!$reference) {
            return $this->linkDir;
        }

        if ($reference == '#') {

            $coredir = BASE_DIR . CORE_SUBDIR . DIRECTORY_SEPARATOR
                . 'web' . DIRECTORY_SEPARATOR . 'links' . DIRECTORY_SEPARATOR;
            if (file_exists($coredir . "{$link}.php")
                or file_exists($coredir . 'styles' . DIRECTORY_SEPARATOR . "{$link}.scss")
                or file_exists($coredir . 'scripts' . DIRECTORY_SEPARATOR . "{$link}.js")) {
                return $coredir;
            };

            foreach ($this->bases as $base) {
                $basedir = BASE_DIR . BASEMOUNTS_SUBDIR . DIRECTORY_SEPARATOR . $base->getID()
                    . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'links' . DIRECTORY_SEPARATOR;

                if (file_exists($basedir . "{$link}.php")
                    or file_exists($basedir . 'styles' . DIRECTORY_SEPARATOR . "{$link}.scss")
                    or file_exists($basedir . 'scripts' . DIRECTORY_SEPARATOR . "{$link}.js")) {
                    return $basedir;
                };
            }

            return null;
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////

        $refName = str_replace('#', '', $reference);

        $refGear = null;
        foreach ($this->gears as $gear) {
            if ($gear->getID() == $refName)
                $refGear = $gear;
        }

        if ($refGear) {
            $basedir = BASE_DIR . EXTRAGEARS_SUBDIR . DIRECTORY_SEPARATOR . $refGear->getID()
                . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'links' . DIRECTORY_SEPARATOR;

            if (file_exists($basedir . "{$link}.php")
                or file_exists($basedir . 'styles' . DIRECTORY_SEPARATOR . "{$link}.scss")
                or file_exists($basedir . 'scripts' . DIRECTORY_SEPARATOR . "{$link}.js")) {
                return $basedir;
            };
        }

        ////////////////////////////////////////////////////////////////////////////////////////////////


        return null;
    }
}