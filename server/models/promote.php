<?php 
	require_once PATH_MODEL."database.php";

	class promote extends database
	{
		function insert($service_code, $describe) {
			$sql = "INSERT INTO `service_promote` (`id`, `service_code`, `create_time`, `describe`) VALUES (NULL, '$service_code', CURRENT_DATE, '$describe');";
			$this->setQuery($sql);
			return $this->query();
		}

		function getnewpromote($service_code) {
			$sql = "SELECT * 
				FROM service_promote sp
				WHERE sp.service_code = '$service_code' AND sp.create_time IN (SELECT MAX(create_time) FROM service_promote sp WHERE sp.service_code = '$service_code')";

			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while($row = mysql_fetch_assoc($result)) {
				$arr[] = $row;
			}
			return $arr;
		}
	}
 ?>