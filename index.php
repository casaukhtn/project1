<?php 
	define('PATH_PAGE', __DIR__."/public/");
	define('PATH_CONTROLLER', __DIR__."/controller/");
	define('PATH_ROUTER', __DIR__."/router/");
	define('PATH', __DIR__."/");

	// lấy file config 
	require_once PATH."system/config.php";
	// điều hướng
	if (isset($_REQUEST['c']) && isset($_REQUEST['a'])) {
		$c = $_REQUEST['c'];
		$a = $_REQUEST['a'];
		$p = array();
		if (isset($_REQUEST['ln']) && isset($_REQUEST['lv'])) {
			for ($i=0; $i < count($_REQUEST['ln']); $i++) { 
				$p[$_REQUEST['ln'][$i]] = $_REQUEST['lv'][$i];
			}
		}
		require_once PATH."controller/controller.php";
		$ctl = new controller();
		$ctl->load($c, $a, $p);
	}else {
		require_once "router/user.php";
	}
 ?>
