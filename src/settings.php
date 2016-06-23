<?php
/**
* @file settings.php
* @synopsis  配置文件
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-09 11:51:24
*/

return [
	'settings' => 
		[
			'displayErrorDetails' => true,
			'renderer' => [
				'template_path' => ROOT . 'templates',
				'template_cache' => ROOT . 'templates' .DS. 'cache',
			],
			'logger' => [
				'name' => 'MySlim',
				'path' => ROOT . 'logs' . DS . 'app.log',
			],
			'cache' => [
				'path' => ROOT . 'cache',
				'ext' => '.cache'
			],
			'db' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'database' => 'officialsite',
				'username' => 'officialsite',
				'password' => 'officialsite',
				'charset' => 'utf8',
				'collation' => 'utf8_general_ci',
				'prefix' => ''
			],
			'sitename' => '北京天际时空网络技术有限公司',
	]
];
