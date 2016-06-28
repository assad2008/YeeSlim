<?php
/**
* @file bootstrap.php
* @synopsis  核心文件
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-06-12 16:14:32
*/

date_default_timezone_set('Asia/Shanghai');

$app = new \Slim\App($settings);
$container = $app->getContainer();

$db = new \Illuminate\Database\Capsule\Manager;
$db->addConnection($container->get('settings')['db']);
$db->bootEloquent();
$db->setAsGlobal();
$app->db = $db;


$container['errorHandler'] = function($c) {
    return new Dopesong\Slim\Error\Whoops($c->get('settings')['displayErrorDetails']);
};

$container['config'] = function($c){
	return $c->get('settings');
};

$container['log'] = function ($c) {
    $logger = new Monolog\Logger($c->get('settings')['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($c->get('settings')['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig($c->get('settings')['renderer']['template_path'], [
        'cache' => $c->get('settings')['renderer']['template_cache'],
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
    return $view;
};

$container['db'] = function($c) use ($db) {
	return $db;
};

$container['smarty'] = function($c)
{
	$tpl = new Template_Lite;
	$tpl->compile_dir = $c->get('settings')['smarty']['compile_dir'];
	$tpl->template_dir = $c->get('settings')['smarty']['template_dir'];
	return $tpl;
};

$container['cache'] = function($c){
	$cache = new \Doctrine\Common\Cache\FilesystemCache($c->get('settings')['cache']['path'],$c->get('settings')['cache']['ext']);
	return $cache;
};

