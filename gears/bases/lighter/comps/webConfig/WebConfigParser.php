<?php
namespace Bright;

class WebConfigParser
{
    /**
     * @var string $filename
     */
    private string $filename;

    /**
     * GearConfigParser constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    function parse() : WebConfig
    {
        if(file_exists($this->filename)){
            $config = parse_ini_file($this->filename);
            return new WebConfig(
                ($config['force_page_reload'] != null ? $config['force_page_reload'] : DefaultWebConfig::FORCE_PAGE_RELOAD)
            );
        }

        return DefaultWebConfig::newInstance();
    }
}