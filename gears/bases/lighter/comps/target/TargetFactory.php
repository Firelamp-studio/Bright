<?php

namespace Bright;

class TargetFactory
{
    private function __construct(){}

    public static function newInstance(string $path, bool $get_deploy_path = true) : TargetResult
    {

        if($get_deploy_path){
            $obtainer = new DeployTargetObtainer(trim($path, ' /'));
        } else {
            $obtainer = new DevTargetObtainer(trim($path, ' /'));
        }

        return $obtainer->getTarget();
    }
}