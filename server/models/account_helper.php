<?php 
	session_start();

	function remember_current_account($token_id) {
		$_SESSION['token_account'] = $token_id;
	}	

	function current_account($key = 'token_account') {
		return $_SESSION[$key];
	}

	function clear_account() {
		session_unset(); 
	}
 ?>