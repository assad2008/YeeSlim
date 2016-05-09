<?php
/**
* @file function_helper.php
* @synopsis  帮助函数
* @author Yee, <rlk002@gmail.com>
* @version 1.0
* @date 2016-05-09 11:32:31
*/

	function debug($var = null,$type = 2) 
	{
		if($var === NULL)
		{
			$var = $GLOBALS;
		}
		header("Content-type:text/html;charset=utf-8");
		echo '<pre style="word-wrap: break-word;background-color:black;color:white;font-size:13px; border: 2px solid green;padding: 5px;">变量跟踪信息：'."\n";
		if($type == 1)
		{
			var_dump($var);
		}elseif($type == 2)
		{
			print_r($var);
		}
		echo '</pre>';
		exit();
	}

	function random($length, $numeric = 0) 
	{
		PHP_VERSION < '4.2.0' ? mt_srand((double)microtime() * 1000000) : mt_srand();
		$seed = base_convert(md5(print_r($_SERVER, 1).microtime()), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
		$hash = '';
		$max = strlen($seed) - 1;
		for($i = 0; $i < $length; $i++)
		{
			$hash .= $seed[mt_rand(0, $max)];
		}
		return $hash;
	}


	function create_guidq() 
	{
		$charid = md5(uniqid(mt_rand(), true));
		$hyphen = chr(45);
		$uuid = substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12);
		return $uuid;
	}


	function gensign($tokenLen = 60) 
	{
		if (file_exists('/dev/urandom'))
		{
			$randomData = file_get_contents('/dev/urandom', false, null, 0, 100) . uniqid(mt_rand(), true);
		}else
		{
			$randomData = mt_rand() . mt_rand() . mt_rand() . mt_rand() . microtime(true) . uniqid(mt_rand(), true);
		}
		return substr(hash('sha512', $randomData), 0, $tokenLen);
	}
