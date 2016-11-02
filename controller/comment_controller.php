<?php 
	/**
	* 
	*/
	require_once "controller.php";
	require_once PATH_MODEL."comment.php";

	class comment_controller extends controller
	{
		function getallcomment() {
			if (isset($this->parameters['service_code'])) {
				$service_code = $this->parameters['service_code'];
				$model = new comment();

				$arr = $model->get_all_comment($service_code);

				if (is_array($arr) && count($arr) > 0) {
					$this->data = $arr; 
					return 1;
				}
			} 
			return 0;
		}

		function checkaccess() {
			if (isset($this->parameters['id_comment'])) {
				$id_comment = $this->parameters['id_comment'];
				$model = new comment();
				return $model->check_access($id_comment);
			} 
			return 0;
		}

		function addcomment() {
			if (isset($this->parameters['service_code']) && isset($this->parameters['content'])) {
				$service_code = $this->parameters['service_code'];
				$content = $this->parameters['content'];

				$model = new comment();

				return $model->insert($service_code, $content);
			} 
			return 0;
		}

		function delcomment() {
			if (isset($this->parameters['id_comment'])) {
				$id_comment = $this->parameters['id_comment'];
				$model = new comment();

				return $model->delete($id_comment);
			} 
			return 0;
		}

	}
 ?>