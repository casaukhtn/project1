<?php 
	define('PATH_PAGE', __DIR__."/public/");
	define('PATH_CONTROLLER', __DIR__."/controller/");
	define('PATH_ROUTER', __DIR__."/router/");
	define('PATH', __DIR__."/");
	define('PATH_MODEL', __DIR__."/server/models/");
	define('PATH_SYSTEM', __DIR__."/system/");

	// lấy file config 
	require_once PATH_SYSTEM."config.php";
	require_once PATH_SYSTEM."constant.php";
	require_once PATH_MODEL."helper.php";
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
