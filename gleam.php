<?php

use Bright\Bright;

function pretty_var_dump($var){
    highlight_string("<?php \$data = " . var_export($var, true) . "; ?>\n");
}

define('BASE_DIR', __DIR__);
define('DEV_SUBDIR', '/dev');
define('GEARS_SUBDIR', '/gears');
define('EXTRAGEARS_SUBDIR', GEARS_SUBDIR . '/extra');
define('DRAFT_SUBDIR', '/draft');
define('CORE_SUBDIR', '/core');
define('EMBEDDED_DIR', BASE_DIR . '/embedded');
define('BASEMOUNTS_SUBDIR', GEARS_SUBDIR . '/bases');
define('DEPLOY_SUBDIR', '/web');

define('DEFAULT_PAGE_PATH', 'index');

///////////////////////////////////////////////////////////////////////////////////

require 'embedded/classLoader/start-class-loader.php';

$bright = new Bright();

///////////////////////////////////////////////////////////////////////////////////

$bright->lightUp();