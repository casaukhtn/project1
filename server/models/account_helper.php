<?php 
	session_start();

	function remember_current_account($token_id, $key="token_account") {
		$_SESSION[$key] = $token_id;
	}	

	function current_account($key = 'token_account') {
		if(isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return 0;
	}

	function account_admin() {
		if (current_account()) {
			$level = current_account('level');
			if ($level == LEVEL_ADMIN) {
				return 1;
			}
		}
		return 0;
	}

	function clear_account() {
		session_unset(); 
	}
 ?>