<?php


class Bright
{
    private static $config;

    public static function getConfig()
    {
        if (!self::$config)
            self::$config = parse_ini_file(__DIR__ . '/bright.ini', true, INI_SCANNER_TYPED);
        return self::$config;
    }

    public static function isDev(): bool {
        return !self::getConfig()['specs']['released'];
    }

    /**
     * @var Core $core
     */
    private $core;

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();

//        if (!isset($_SESSION['bright_db'])) {
//            $db = new BrightDB(self::getConfig()['database']);
//
//            if (!$db->init()->getResult()) {
//                http_response_code(500);
//                die;
//            }
//            $db->createDB();
//
//            $_SESSION['bright_db'] = $db;
//        } else {
//            /** @var BrightDB $db */
//            $db = $_SESSION['bright_db'];
//            if (!$db->isConnectionAlive())
//                $db->connect();
//        }

        if (self::getConfig()['dev']['use_session_core']) {
            if (isset($_SESSION['bright_core'])) {
                $this->core = $_SESSION['bright_core'];
            } else {
                $this->core = new Core();
                $_SESSION['bright_core'] = $this->core;
            }
        } else {
            unset($_SESSION['bright_core']);
            $this->core = new Core();
        }
    }

    public function lightUp(): void
    {
        (new Pointer($this->core))->sendView();
    }
}