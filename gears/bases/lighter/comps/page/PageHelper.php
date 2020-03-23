<?php


class PageHelper
{
    /**
     * @var bool $isDraftPage
     */
    private $isDraftPage;

    /**
     * PageHelper constructor.
     * @param bool $isDraftPage
     */
    public function __construct(bool $isDraftPage)
    {
        $this->isDraftPage = $isDraftPage;
    }

    /**
     * @param string $filename
     * @return string
     */
    public function getResourceFileURL(string $filename): string
    {
        if ($this->isDraftPage)
            return URL::getSiteURL() . DEV_SUBDIR . '/resources/' . $filename;
        else
            return URL::getSiteURL() . '/resources/' . $filename;
    }

    /**
     * @param string $pagePath
     * @param string $lang
     * @return string
     */
    public function getPageURL(?string $pagePath = '', string $lang = ''): string
    {
        if ($pagePath === null) {

            if ($this->isDraftPage)
                return URL::getSiteURL() . ($lang ? '/' . $lang : URL::getLang()) . URL::getPath() . '?draft=on';
            else
                return URL::getSiteURL() . ($lang ? '/' . $lang : URL::getLang()) . URL::getPath();

        } else {

            if ($this->isDraftPage)
                return URL::getSiteURL() . '/' . ($lang ? $lang : URL::getLang()) . '/' . $pagePath . '?draft=on';
            else
                return URL::getSiteURL() . '/' . ($lang ? $lang : URL::getLang()) . '/' . $pagePath;

        }
    }

    /**
     * @param string $svgName
     * @param string $basedir
     * @return string
     */
    public function getSVG(string $svgName, string $basedir = ''): string
    {
        if ($this->isDraftPage)
            $resDir = BASE_DIR . DEV_SUBDIR . '/resources/';
        else
            $resDir = BASE_DIR . '/resources/';

        return file_get_contents($resDir . ($basedir ? $basedir . '/' : '') . $svgName . '.svg');
    }

    public function getLocalizedText(string $id, string $group = 'default'): string
    {
        if ($this->isDraftPage)
            $localizationFileDir = BASE_DIR . DEV_SUBDIR . '/resources/localization/' . $group . '.xml';
        else
            $localizationFileDir = BASE_DIR . '/resources/localization/' . $group . '.xml';

        $localization = simplexml_load_file($localizationFileDir, 'SimpleXMLElement');

        $lang = URL::getLang();

        $text = trim($localization->$id->$lang);
        if(empty($text)){
            $lang = Bright::getConfig()['essentials']['default_lang'];
            $text = '<i style="color: darkred;font-size: smaller;">[language unavailable]</i>' . trim($localization->$id->$lang);
        }
        BrazierHelper::simplyMinimizeCode($text);
        return $text;
    }
}