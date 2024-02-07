<?php
	session_start();

	/* Init Basepath */
	$appName = 'pbsi';
	$whitelist = array('127.0.0.1', '::1');
	$basePath = '';
	$appPath = '';

	$previewContentful = false;

	if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
		$cacheOn = false;
		$basePath = '/pbsi/public';
		$appPath = '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];
	}

	define('BASE_PATH', $basePath);
	define('APP_PATH', $appPath . $basePath . '/');
?>