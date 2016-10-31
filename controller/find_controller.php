<?php 
	/**
	* 
	*/
	require_once "controller.php";
	require_once PATH_MODEL."service.php";

	class find_controller extends controller
	{
		function getlisttypeservice() {
			$model = new service();
			$arr = $model->get_all_type_service();
			if (is_array($arr)) {
				$this->data = $arr; 
				return 1;
			}

		}

		function getlistdatabytype() {
			if (isset($this->parameters['id_service_type'])) {
				$service_type = $this->parameters['id_service_type'];
				$model = new service();

				$arr = $model->get_data_service_by_type($service_type);

				if (is_array($arr) && count($arr) > 0) {
					$this->data = $arr; 
					return 1;
				}
			} 
		}
	}
 ?>