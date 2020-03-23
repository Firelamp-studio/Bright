<?php


class WebConfigParser
{
    /**
     * @var string $filename
     */
    private $filename;

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
                ($config['dev_mode'] != null ? $config['dev_mode'] : DefaultWebConfig::DEV_MODE)
            );
        }

        return DefaultWebConfig::newInstance();
    }
}