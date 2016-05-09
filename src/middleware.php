<?php
/**
* @file middleware.php
* @synopsis  middleware
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-09 11:30:15
*/


foreach (glob(SRCDIR . 'libs' . DS . '*.php') AS $filename) 
{
    require_once($filename);
}
