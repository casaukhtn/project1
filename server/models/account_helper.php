<?php 
	session_start();

	function remember_current_account($token_id) {
		$_SESSION['token_account'] = $token_id;
	}	

	function current_account($key = 'token_account') {
		if(isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return 0;
	}

	function clear_account() {
		session_unset(); 
	}
 ?>