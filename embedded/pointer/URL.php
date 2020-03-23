<?php

class URL
{
    private static $protocol;
    private static $subDomain;
    private static $domainName;
    private static $path;
    private static $lang;
    private static $filename;

    private function __construct(){}

    /**
     * @return string
     */
    public static function getProtocol(): string
    {
        if (!self::$protocol)
            self::$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";

        return self::$protocol;
    }

    /**
     * @return mixed
     */
    public static function getSubDomain()
    {
        return self::$subDomain;
    }

    /**
     * @return mixed
     */
    public static function getDomainName()
    {
        if (!self::$domainName)
            self::$domainName = 'localhost/bright'; //strtolower($_SERVER['HTTP_HOST']);

        return self::$domainName;
    }

    /**
     * @return string
     */
    public static function getPath()
    {
        if (!self::$path)
            self::$path = '/' . trim(strtolower(filter_input(INPUT_GET, 'path', FILTER_SANITIZE_URL)), '/');

        return self::$path ? self::$path : '';
    }

    /**
     * @return string
     */
    public static function getLang()
    {
        if (!self::$lang)
            self::$lang = strtolower(filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING));

        $default_lang = Bright::getConfig()['essentials']['default_lang'];
        $default_lang = $default_lang ? $default_lang : 'en';

        return self::$lang ? self::$lang : $default_lang;
    }

    /**
     * @return string
     */
    public static function getFilename(): string
    {
        if (!self::$filename)
            self::$filename = strtolower(basename(explode('?', $_SERVER['REQUEST_URI'])[0]));

        return self::$filename;
    }

    public static function getSiteURL(): string
    {
        return self::getProtocol() . '://' . self::getDomainName();
    }

}