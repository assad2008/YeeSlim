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

error_reporting(E_ALL ^ E_NOTICE);

if(file_exists(VENDORDIR . "autoload.php")){
	require(VENDORDIR . 'autoload.php');
}else{
	die("<pre>Run 'composer.phar install' in root dir</pre>");
}

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
Debugger::$showBar = False;

$settings = require(SRCDIR . 'settings.php');
require(SRCDIR . 'bootstrap.php');

foreach(glob(ROUTERDIR . '*.php') AS $router) {
    require_once $router;
}

$app->run();
