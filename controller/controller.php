<?php 
	/**
	* 
	*/
	class controller 
	{
		public $parameters = array();
		public $data = array();
		function load($c, $a, $p) {

			$ft_controller= $c."_controller";

			if (!file_exists(PATH."controller/".$ft_controller.".php")) {
				die("controller không tồn tại");
			}
			require PATH."controller/".$ft_controller.".php";

			if (!class_exists($ft_controller)) {
				die('class không tồn tại');
			}

			$controller_obj = new $ft_controller();

			if (!method_exists($controller_obj, $a)) {
				die("Method không tồn tại");
			}
			$output = array("result"=>0, "data"=>array());

			$controller_obj->parameters=$p;
			$output['result'] = $controller_obj->{$a}();
			$output['data'] = $controller_obj->data;

			echo json_encode($output);
		}
	}
	
 ?>