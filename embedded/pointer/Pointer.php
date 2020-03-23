<?php

class Pointer
{
    /**
     * @var boolean $draftMode
     */
    private $draftMode;

    /**
     * @var Core $core
     */
    private $core;

    /**
     * MirrorDispatcher constructor.
     * @param Core $core
     */
    public function __construct(Core $core)
    {
        /**
         * Construct bright Core
         */
        $this->core = $core;

        if (session_status() == PHP_SESSION_DISABLED) {
            session_start();
        }

        $this->draftMode = false;

        $config = Bright::getConfig();

        /**
         * Redirect in case of different protocol or calling gleam.php file
         */
//        if ($config['essentials']['bright_url'] != URL::getProtocol() . '://' . URL::getDomainName()
//            or URL::getFilename() == 'gleam.php') {
//            header('location: ' . $config['essentials']['bright_url'] . URL::getPath());
//            die;
//        }

        /**
         * Redirect if calling homepage directly
         */
        /*if (URL::getFilename() == DEFAULT_PAGE_PATH) {
            header('location: ' . $config['essentials']['bright_url']);
            die;
        }*/
    }

    public function sendView(): void
    {
        if ($this->draftMode) {
            //TODO: Draft mode visualization
        } else {
            try {
                /** @var Lighter $lighter */
                $lighter = $this->core->getGear('lighter');
                echo $lighter->getPageRender()->getPage();
            } catch (PageNotFoundException $e) {
                http_response_code(404);
            }
        }
    }
}