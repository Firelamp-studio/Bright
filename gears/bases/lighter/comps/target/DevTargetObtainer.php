<?php


class DevTargetObtainer extends TargetObtainer
{

    public function getTargetResult(string $path, string $requestType, bool $is_default): TargetResult
    {
        $pathParts = $path ? explode('/', $path) : [];

        switch ($requestType) {

            case self::CORE_REQUEST:

                $targetPath = CORE_SUBDIR . '/';

                if($is_default){

                    return new TargetResult(
                        $targetPath,
                        'core',
                        self::CORE_REQUEST
                    );

                } else {

                    return new TargetResult(
                        $targetPath,
                        implode('@', $pathParts),
                        self::CORE_REQUEST
                    );

                }

                break;

            case self::DRAFT_REQUEST:

                $targetPath = DEV_SUBDIR . '/';

                if($is_default){

                    return new TargetResult(
                        $targetPath,
                        DEFAULT_PAGE_PATH,
                        self::DRAFT_REQUEST
                    );

                } else {

                    return new TargetResult(
                        $targetPath,
                        implode('@', $pathParts),
                        self::DRAFT_REQUEST
                    );

                }

                break;

            case self::GEAR_REQUEST:

                $baseName = $pathParts[1];
                $targetPath = EXTRAGEARS_SUBDIR . "/{$baseName}/";

                if($is_default){

                    return new TargetResult(
                        $targetPath,
                        $baseName,
                        self::GEAR_REQUEST
                    );

                } else {

                    return new TargetResult(
                        $targetPath,
                        implode('@', array_slice($pathParts, 2)),
                        self::GEAR_REQUEST
                    );

                }

                break;

            case self::BASEMOUNT_REQUEST:

                $baseName = $pathParts[1];
                $targetPath = BASEMOUNTS_SUBDIR . "/{$baseName}/";

                if($is_default){

                    return new TargetResult(
                        $targetPath,
                        $baseName,
                        self::BASEMOUNT_REQUEST
                    );

                } else {

                    return new TargetResult(
                        $targetPath,
                        implode('@', array_slice($pathParts, 2)),
                        self::BASEMOUNT_REQUEST
                    );

                }

                break;
        }

        return null;
    }
}