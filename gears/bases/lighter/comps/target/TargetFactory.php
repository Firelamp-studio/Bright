<?php


class TargetFactory
{
    private function __construct(){}

    public static function newInstance(string $path, bool $get_deploy_path = true) : TargetResult
    {
        if($get_deploy_path){
            $obtainer = new DeployTargetObtainer($path);
        } else {
            $obtainer = new DevTargetObtainer($path);
        }

        return $obtainer->getTarget();
    }
}