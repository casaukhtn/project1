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
				$this->output['result'] = 1;
				$this->output['data']['username'] = $username;
				$this->output['data']['password'] = $password;
			} 
			echo json_encode($this->output);
		}
	}
 ?>