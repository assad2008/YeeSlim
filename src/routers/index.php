<?php
/**
* @file routes.php
* @synopsis  路由
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-06 17:37:16
*/

$app->get('/{name}.html', function ($request, $response, $args) {
    $this->logger->info("gamerecommend '/' route");
    return $this->view->render($response, 'index.html', $args);
});
