<?php
require 'WebApp/lib/Dev.php';
require __DIR__ . '/vendor/autoload.php';

use WebApp\Core\Router;

spl_autoload_register(function ($class) {
	$path = str_replace('\\', '/', $class.'.php');
	if (file_exists($path)) {
		require $path;
	}
});

session_start();

$router = new Router;
$router->run();
