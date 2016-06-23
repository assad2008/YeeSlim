<?php
/**
* @file routes.php
* @synopsis  路由
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-06 17:37:16
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response, $args) use ($app)
{
	$title = $this->config->get('sitename');
	return $this->view->render($response, 'index.html',['title' => $title]);
});



