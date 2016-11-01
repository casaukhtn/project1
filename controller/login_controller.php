<?php 
	/**
	* 
	*/
	require_once "controller.php";
	class login_controller extends controller
	{
		function checkaccount() {
			if (isset($this->parameters['username'])&&isset($this->parameters['password'])) {
				$username = $this->parameters['username'];
				$password = $this->parameters['password'];
				
				$password = md5($password);

				require_once PATH_MODEL."account.php";
				$model = new account();
				$arr = $model->get_account($username, $password);

				if (is_array($arr) && count($arr) == 1) {
					remember_current_account($arr[0]['token_id']);
					$this->data['token_id'] = $arr[0]['token_id']; 
					return 1;
				}
			} 
			return 0;
		}

		function register() {
			if (isset($this->parameters['username'])&&isset($this->parameters['password'])) {
				$username = $this->parameters['username'];
				$password = $this->parameters['password'];

				require_once PATH_MODEL."account.php";
				$model = new account();
				if ($model->insert($username, $password)) {
					return 1;
				}
				return 0;
			}
		}

		function logout() {
			clear_account();
			return 1;
		}
	}
 ?>