<?php 
	/**
	* 
	*/
	require_once "controller.php";
	require_once PATH_MODEL."promote.php";
	define('WEBSITE', 'website');
	define('PRICE', 'price');
	define('PHONE', 'phone');

	class promote_controller extends controller
	{
		function addpromote() {
			if (isset($this->parameters['service_code']) && isset($this->parameters['describe'])) {
				$service_code = $this->parameters['service_code'];
				$describe = $this->parameters['describe'];

				$model = new promote();

				return $model->insert($service_code, $describe);
			} 
			return 0;
		}

		function getnewpromote() {
			if (isset($this->parameters['service_code'])) {
				$service_code = $this->parameters['service_code'];

				$model = new promote();
				$this->data = $model->getnewpromote($service_code);
				return 1;
			} 
			return 0;
		}
		
	}
 ?>