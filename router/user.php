<?php 
		// điều hướng page
	define("USER", "user");
	if(empty($_GET)) {
		require_once $PATH_PAGE.$PAGES['default'];;
	} else {
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
			if (isset($PAGES[$page])) {
				require_once $PATH_PAGE.$PAGES[$page];
			}
		}
	}
 ?>