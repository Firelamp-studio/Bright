<?php

namespace Bright;

class _Lighter extends ELighter
{

    public Core $core;
    public EBrazier $brazier;

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

            $joint = $this->core->getJoint($deployTarget->getTarget());
            if (isset($joint) and $joint->isOverridden() and $joint->isBase() == $isBase) {

                header('location:' . URL::getSiteURL() . '/gear/' . $joint->getImplementedJoint()->getID());
                die;
            }
        }

        $pageDir = BASE_DIR . $deployTarget->getPath() . $deployTarget->getTarget() . '.php';

        $devTarget = TargetFactory::newInstance($path, false);

        $confFile = BASE_DIR . $devTarget->getPath() . 'web.ini';
        $config = (new WebConfigParser($confFile))->parse();

        $devMode = $config->forcePageReload();

        $page = new PageImplementation($relatedElement,
            ($deployTarget->getTargetType() == TargetObtainer::DRAFT_REQUEST ?
                ucfirst(str_replace('-', ' ', $deployTarget->getTarget())) . ' - ' . BrightData::getConfig()['preferences']['site_title']
                :
                ucfirst(str_replace('-', ' ', $deployTarget->getTarget())) . ' - BrightData')

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

    function init()
    {
        // TODO: Implement init() method.
    }
}