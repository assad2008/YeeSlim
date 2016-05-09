<?php
// DIC configuration

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig($c->get('settings')['renderer']['template_path'], [
        'cache' => $c->get('settings')['renderer']['template_cache']
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
    return $view;
};

$container['db'] = function($c){
	$db = new \Illuminate\Database\Capsule\Manager;
	$db->addConnection($c->get('settings')['db']);
	$db->setAsGlobal();
	$db->bootEloquent();
	return $db;
};

