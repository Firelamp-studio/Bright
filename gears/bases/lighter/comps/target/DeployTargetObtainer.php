<?php


class DeployTargetObtainer extends TargetObtainer
{
    public function getTargetResult(string $path, string $requestType, bool $is_default): TargetResult
    {
        switch ($requestType) {

            case self::CORE_REQUEST:

                if ($is_default) {

                    return new TargetResult(
                        DEPLOY_SUBDIR . '/bright/' . $path . '/',
                        'core',
                        self::CORE_REQUEST
                    );

                }

                break;

            case self::DRAFT_REQUEST:

                if ($is_default) {

                    return new TargetResult(
                        DEPLOY_SUBDIR . '/draft/' . $path . '/',
                        DEFAULT_PAGE_PATH,
                        self::DRAFT_REQUEST
                    );

                } else {

                    return new TargetResult(
                        DEPLOY_SUBDIR . '/draft/' . $path . '/',
                        end(explode('/', $path)),
                        self::DRAFT_REQUEST
                    );

                }

                break;
        }

        return new TargetResult(
            DEPLOY_SUBDIR . '/bright/' . $path . '/',
            end(explode('/', $path)),
            $requestType
        );
    }
}