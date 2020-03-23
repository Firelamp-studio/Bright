<?php

class BrightLighter extends Lighter
{
    /**
     * @var Core
     */
    public $core;

    /**
     * @var Brazier
     */
    public $brazier;

    /**
     * @return PageLighter
     * @throws PageNotFoundException
     */
    function getPageRender(): PageLighter
    {
        $path = URL::getPath();
        $deployTarget = TargetFactory::newInstance($path);

        $isBase = $deployTarget->getTargetType() == TargetObtainer::BASEMOUNT_REQUEST;
        $relatedElement = $this->core;
        if ($isBase or $deployTarget->getTargetType() == TargetObtainer::GEAR_REQUEST) {
            $relatedElement = $this->core->getJoint($deployTarget->getTarget())->getImplementedJoint();
            if ($relatedElement) {
                $path = ($isBase ? 'base/' : 'gear/') . $relatedElement->getID();
                $deployTarget = TargetFactory::newInstance($path);
            } else {
                http_response_code(404);
                die;
            }
        }

        $pageDir = BASE_DIR . $deployTarget->getPath() . $deployTarget->getTarget() . '.php';

        $devTarget = TargetFactory::newInstance($path, false);

        $confFile = BASE_DIR . $devTarget->getPath() . 'web.ini';
        $config = (new WebConfigParser($confFile))->parse();

        $devMode = $config->isDevMode();

        $page = new PageImplementation($relatedElement,
            ($deployTarget->getTargetType() == TargetObtainer::DRAFT_REQUEST ?
                ucfirst(str_replace('-', ' ', $deployTarget->getTarget())) . ' - ' . Bright::getConfig()['essentials']['site_title']
                :
                ucfirst(str_replace('-', ' ', $deployTarget->getTarget())) . ' - Bright')

            , $deployTarget->getTargetType() == TargetObtainer::DRAFT_REQUEST
        );

        $this->dispatchEvent('onPageObtained', ['page' => $page]);

        if ($devMode or !file_exists($pageDir)) {
            try {
                $this->brazier->burnPage($devTarget, $deployTarget, $page);
            } catch (PageBuildFailedException $e) {
                throw new PageNotFoundException();
            }
        }

        return new PageLighter($page, $pageDir);
    }
}