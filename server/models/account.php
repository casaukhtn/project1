<?php 
	require_once PATH_MODEL."database.php";
	/**
	* 
	*/
	class account extends database
	{
		function insert($username, $password) {
			$token_id = create_uid(false);
			$level = LEVEL_USER;
			$password = md5($password);

			$sql = "INSERT INTO `account` (`token_id`, `username`, `password`, `level`) VALUES ('$token_id', '$username', '$password', '$level');";
			$this->setQuery($sql);
			return $this->query();
		}

		function get_account($username, $password) {
			$sql = "SELECT * FROM `account` WHERE `username` LIKE '$username' and `password` = '$password'";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}
	}
 ?>