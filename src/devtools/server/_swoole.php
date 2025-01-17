#!/usr/bin/env php
<?php
// swoole.php

if (! defined ( 'DS' )) {
	define ( 'DS', DIRECTORY_SEPARATOR );
	define ( 'ROOT', __DIR__ . \DS .'..'.\DS. 'app' . \DS );
}
$config=include ROOT.'config/config.php';
$sConfig= include __DIR__.\DS.'swoole-config.php';
$config["sessionName"]=$sConfig["sessionName"];
$address=$sConfig['host'].':'.$sConfig['port'];
$config ["siteUrl"] = 'http://'.$address;
require ROOT . './../vendor/autoload.php';
require ROOT.'config/services.php';
$reactServer=new \Ubiquity\servers\swoole\SwooleServer();
$reactServer->init($config, __DIR__);
$reactServer->run($sConfig['host'],$sConfig['port'],$sConfig);
