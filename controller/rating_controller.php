<?php 
	/**
	* 
	*/
	require_once "controller.php";
	require_once PATH_MODEL."rating.php";

	class rating_controller extends controller
	{

		function set_rating() {
			if (isset($this->parameters['service_code']) && isset($this->parameters['score'])) {
				$service_code = $this->parameters['service_code'];
				$score = $this->parameters['score'];

				$model = new rating();

				return $model->set_rating($service_code, $score);
			} 
			return 0;
		}

		function get_rating_medium() {
			
			if (isset($this->parameters['service_code'])) {
				$service_code = $this->parameters['service_code'];

				$model = new rating();

				$this->data['scroce'] = $model->get_rating_medium($service_code);
				return 1;
			} 
			return 0;
		}
	}
 ?>