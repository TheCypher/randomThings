<?php
	//error_reporting(-1);
	//ini_set('display_errors', 'On');
	
	/**
	* phpNgin - simple PHP framework
	*/

	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);
	use App\Ngin\Handler as Handler;

	require'vendor/autoload.php';
	$handler = new Handler();
	$handler->loadPage(['page'=>"index", 'path'=>"$site_path"]);
?>