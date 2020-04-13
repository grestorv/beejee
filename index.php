<?php

	error_reporting (E_ALL);
	session_start();
	define ('DIRSEP', DIRECTORY_SEPARATOR);
	$site_path = realpath(dirname(__FILE__) . DIRSEP ) . DIRSEP;

	define ('site_path', $site_path);


	function __autoload($class_name) {

		$filename = strtolower($class_name) . '.php';

		$file = site_path . 'classes' . DIRSEP . $filename;

		if (file_exists($file) == false) {
				return false;

		}


		include ($file);

	}


	$registry = new Registry;
	$db = mysqli_connect('localhost','root','','beejee');
	mysqli_query($db,"SET NAMES 'utf8'");
	$registry->set ('db', $db);

	
	$template = new Template($registry);
	$registry->set ('template', $template);

	/*$model = new Model_Index($registry);
	$registry->set('model', $model);*/


	$router = new Router($registry);
	$router->setPath (site_path . 'controllers');
	$router->delegate();

	$registry->set ('router', $router);

?>
