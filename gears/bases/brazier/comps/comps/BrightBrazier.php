<?php

use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Exception\CompilerException;
use Leafo\ScssPhp\Formatter\Compressed;

class BrightBrazier extends Brazier
{
    /**
     * @var Core
     */
    public $core;

    /**
     * @param TargetResult $devTarget
     * @param TargetResult $deployTarget
     * @param PageImplementation $page
     * @return void
     * @throws PageBuildFailedException
     */
    public function burnPage(TargetResult $devTarget, TargetResult $deployTarget, PageImplementation $page): void
    {
        $bases = $this->core->getBaseJoints();
        $gears = $this->core->getGearJoints();

        $baseDevPath = BASE_DIR . $devTarget->getPath() . 'web/';
        $pageFileDev = $baseDevPath . $devTarget->getTarget() . '.php';

        if (!file_exists($pageFileDev)) {
            throw new PageBuildFailedException("Dev page file not exists");
        }
        $styleFileDev = $baseDevPath . 'styles/' . $devTarget->getTarget() . '.scss';
        $scriptFileDev = $baseDevPath . 'scripts/' . $devTarget->getTarget() . '.js';

        if (!file_exists(BASE_DIR . $deployTarget->getPath())) {
            mkdir(BASE_DIR . $deployTarget->getPath(), 0777, true);
        }

        $baseDeployPath = BASE_DIR . $deployTarget->getPath() . $deployTarget->getTarget();
        $pageFileDeploy = $baseDeployPath . '.php';
        $styleFileDeploy = $baseDeployPath . '.css';
        $scriptFileDeploy = $baseDeployPath . '.js';


        //Remove old files if exists
        if (file_exists($pageFileDeploy))
            unlink($pageFileDeploy);
        if (file_exists($styleFileDeploy))
            unlink($styleFileDeploy);
        if (file_exists($scriptFileDeploy))
            unlink($scriptFileDeploy);


        // Implements Page Script and Style
        $htmlBodyContent = file_get_contents($pageFileDev);

        // Put content inside Html Page minimum
        $htmlContent = '<!DOCTYPE html><html><head></head><body>' . $htmlBodyContent . '</body></html>';


        // Create scss Compiler
        $scssCompiler = new Compiler();
        $scssCompiler->setFormatter(Compressed::class);
        $scssCompiler->setVariables(['resources' => '"' . URL::getSiteURL() . ($devTarget->getTargetType() == TargetObtainer::DRAFT_REQUEST ? '/dev' : '') . '/resources/"']);
        $scssImportPath = $baseDevPath . 'styles';

        // Add base style include directory
        $globalImportsDir = BASE_DIR . CORE_SUBDIR . '/web/includes/global/';

        $globalImportsCallable = function ($import) use ($globalImportsDir, $baseDevPath) {

            if (strlen($import) > 0 and $import[0] == '#') {

                if (strlen($import) > 1 and $import[1] == '#') {

                    $import = str_replace('##', '', $import);
                    $globalPath = $globalImportsDir . "styles/{$import}.scss";
                    if (file_exists($globalPath)) {
                        return $globalPath;
                    }

                } else {
                    $import = str_replace('#', '', $import);

                    $inclPath = $baseDevPath . "includes/styles/{$import}.scss";

                    if (file_exists($inclPath)) {
                        return $inclPath;
                    } else {
                        $globalPath = $globalImportsDir . "styles/{$import}.scss";

                        if (file_exists($globalPath)) {
                            return $globalPath;
                        }
                    }
                }
            }

            return null;
        };

        if (file_exists($styleFileDev)) {
            $scssCompiler->setImportPaths($scssImportPath);
            $scssCompiler->addImportPath($globalImportsCallable);
            try {
                file_put_contents($styleFileDeploy, $scssCompiler->compile(file_get_contents($styleFileDev), $scssImportPath));
            } catch (CompilerException $ex) {
                echo "<pre>SCSS Compiler Throws Exception:{{$ex->getMessage()}}</pre>";
                die;
            }
        }

        if (file_exists($scriptFileDev))
            file_put_contents($scriptFileDeploy, file_get_contents($scriptFileDev));

        // Append global scripts
        foreach (glob($globalImportsDir . 'scripts/*.js') as $filename) {
            if (file_exists($filename)) {
                file_put_contents($scriptFileDeploy, file_get_contents($filename), FILE_APPEND);
            }
        }
        // Append internal scripts
        foreach (glob(BASE_DIR . $devTarget->getPath() . 'web/includes/scripts/*.js') as $filename) {
            if (file_exists($filename)) {
                file_put_contents($scriptFileDeploy, file_get_contents($filename), FILE_APPEND);
            }
        }

        //Include externals
        $extIncludesDir = BASE_DIR . $devTarget->getPath() . 'web/includes/externals.xml';
        if (file_exists($extIncludesDir)) {
            $extIncludes = simplexml_load_file($extIncludesDir);
            if ($extIncludes) {
                //Include external styles if there are any
                $styles = $extIncludes->styles->style;
                if ($styles->count() > 0) {
                    foreach ($styles as $s) {
                        $htmlContent = str_replace('</head>', "<link rel='stylesheet' href='{$s['link']}'></head>", $htmlContent);
                    }
                }
                //Include external scripts if there are any
                $scripts = $extIncludes->scripts->script;
                if ($scripts->count() > 0) {
                    foreach ($scripts as $s) {
                        $htmlContent = str_replace('</body>', "<script type = 'text/javascript' src = '{$s['link']}' {$s['load']}></script></body>", $htmlContent);
                    }
                }
            }
        }

        // Read Main Page Implementing AtLink and appends every Style and Script to the main
        $linkDir = BASE_DIR . $devTarget->getPath() . 'web/links/';
        $htmlContent = (new ParamsAtLinksParser($htmlContent))->parse(new ParamsAtLinkAgent($scssCompiler, $globalImportsCallable, $linkDir, $styleFileDeploy, $scriptFileDeploy, $bases, $gears));

        // Include generated page style file in generated page
        if (file_exists($styleFileDeploy)) {
            $styleVersion = '0.0.' . time();
            $styleUrl = URL::getSiteURL() . $deployTarget->getPath() . $deployTarget->getTarget() . '.css';
            $htmlContent = str_replace('</head>', "<link rel='stylesheet' href='{$styleUrl}?ver={$styleVersion}'></head>", $htmlContent);
        }
        // Include generated page script file in generated page
        if (file_exists($scriptFileDeploy)) {
            $scriptVersion = '0.0.' . time();
            $scriptUrl = URL::getSiteURL() . $deployTarget->getPath() . $deployTarget->getTarget() . '.js';
            $htmlContent = str_replace('</body>', "<script type = 'text/javascript' src = '{$scriptUrl}?ver={$scriptVersion}' defer></script></body>", $htmlContent);
        }


        //TODO: Include statics data


        // Burn page

        BrazierHelper::simplyMinimizeCode($htmlContent);
        file_put_contents($pageFileDeploy, $htmlContent);
    }

}