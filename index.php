<!-- Điều hướng -->
<?php 
	$PATH_PAGE =  __DIR__."/public/";
	$PATH_CONTROLLER =  __DIR__."/controller/";
	$PATH_ROUTER =  __DIR__."/router/";
	$PATH =  __DIR__."/";
	// lấy file config 
	require_once $PATH."system/config.php";
	// điều hướng
	require_once "router/user.php";
 ?>
