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


//跳转至 newslist.shtml
$app->get('/newslist.html', function(Request $request, Response $response)
{
	$title = '新闻公告'.$this->config->get('sitename');
	return $this->view->render($response, 'newslist.html');
});

//跳转至 aboutus.shtml
$app->get('/aboutus.html', function(Request $request, Response $response)
{
	$title = "关于我们 - " . $this->config->get('sitename');
	return $this->view->render($response, 'aboutus.html',['title' => $title]);
});

//跳转至 contact.shtml
$app->get('/contact.html', function(Request $request, Response $response)
{
	$title = "联系我们 - " . $this->config->get('sitename');
	return $this->view->render($response, 'contact.html');
});

//跳转至 家长监护
$app->get('/jiazhang.html', function(Request $request, Response $response)
{
	return $this->view->render($response, 'jiazhang/index.htm');
});

//跳转至 mhsy.html
$app->get('/game/mhsy.html', function(Request $request, Response $response)
{
	$title = "梦幻神域 - " . $this->config->get('sitename');
	return $this->view->render($response, 'game/mhsy.html');
});

//跳转至 dmw.html
$app->get('/game/dmw.html', function(Request $request, Response $response)
{
	$title = "十万个大魔王 - " . $this->config->get('sitename');
	return $this->view->render($response, 'game/dmw.html');
});

//跳转至 dhmsg.html
$app->get('/game/dhmsg.html', function(Request $request, Response $response)
{
	$title = "大话梦三国 - " . $this->config->get('sitename');
	return $this->view->render($response, 'game/dhmsg.html');
});

//跳转至 lzsg.html
$app->get('/game/lzsg.html', function(Request $request, Response $response)
{
	$title = "龙珠三国 - " . $this->config->get('sitename');
	return $this->view->render($response, 'game/lzsg.html');
});

//跳转至 privacy.html
$app->get('/privacy.html', function(Request $request, Response $response)
{
	$title = "隐私协议 - " . $this->config->get('sitename');
	return $this->view->render($response, 'privacy.html');
});
