<?php 
	session_start();
	if (!isset($_SESSION['global_token'])) {
		$_SESSION['global_token'] = md5( uniqid( mt_rand(),true ) );
	}

	if (!defined('BASE_PATH')) {
		define('BASE_PATH','http://localhost/equipo-6-tm-22-4ta/');
	}

	$_SESSION['_MESSAGE'];
?>