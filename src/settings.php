<?php
/**
* @file settings.php
* @synopsis  配置文件
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-09 11:51:24
*/

return [
    'settings' => [
        'displayErrorDetails' => true,

        'renderer' => [
            'template_path' => ROOT . 'templates',
            'template_cache' => ROOT . 'templates' .DS. 'cache'
        ],

        'logger' => [
            'name' => 'gamerecommend',
            'path' => ROOT . 'logs' . DS . 'app.log',
        ],

				'db' => [
						'driver' => 'mysql',
						'host' => '127.0.0.1',
						'database' => 'ops',
						'username' => 'slim',
						'password' => 'slim',
						'charset' => 'utf8',
						'collation' => 'utf8_general_ci',
						'prefix' => ''
				],
    ],
];
