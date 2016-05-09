<?php
/**
* @file index.php
* @synopsis  入口文件
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-06 17:34:04
*/

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__DIR__)) . DS);
define("VENDORDIR", ROOT . "vendor" . DS);
define("SRCDIR", ROOT . "src" . DS);
define("ROUTERDIR",SRCDIR . "routers" . DS);

require(VENDORDIR . 'autoload.php');

$settings = require(SRCDIR . 'settings.php');
$app = new \Slim\App($settings);
require(SRCDIR . 'dependencies.php');
require(SRCDIR . 'middleware.php');

foreach(glob(ROUTERDIR . '*.php') AS $router) {
    require_once $router;
}

$app->run();
