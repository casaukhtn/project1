<?php 
	/**
	* 
	*/
	require_once "controller.php";
	require_once PATH_MODEL."service.php";
	define('WEBSITE', 'website');
	define('PRICE', 'price');
	define('PHONE', 'phone');

	class service_controller extends controller
	{

		function update_website() {
			if (account_admin()) {
				if (isset($this->parameters['id_service']) && isset($this->parameters['website'])) {
					$id_service = $this->parameters['id_service'];
					$website = $this->parameters['website'];

					$model = new service();

					return $model->update($id_service, WEBSITE, $website);
				} 
			}
			return 0;
		}

		function update_price() {
			if (account_admin()) {
				if (isset($this->parameters['id_service']) && isset($this->parameters['price'])) {
					$id_service = $this->parameters['id_service'];
					$price = $this->parameters['price'];

					$model = new service();

					return $model->update($id_service, PRICE, $price);
				} 
			}
			return 0;
		}

		function update_phone() {
			if (account_admin()) {
				if (isset($this->parameters['id_service']) && isset($this->parameters['phone'])) {
					$id_service = $this->parameters['id_service'];
					$phone = $this->parameters['phone'];

					$model = new service();

					return $model->update($id_service, PHONE, $phone);
				} 
			}
			return 0;
		}
	}
 ?>