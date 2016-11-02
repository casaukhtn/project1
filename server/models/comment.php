<?php 
	require_once PATH_MODEL."database.php";
	/**
	* 
	*/
	class comment extends database
	{
		function insert($service_code, $content) {
			if (current_account()) {
				$comment_user = current_account();
				$sql = "INSERT INTO `comment` (`id_comment`, `service_code`, `comment_user`, `content`) VALUES (NULL, '$service_code', '$comment_user', '$content');";
				$this->setQuery($sql);
				return $this->query();
			}
			return -1;
		}

		
		// 
		function get_all_comment($service_code) {
			$sql = "SELECT cm.*, ac.username comment_by, ac.avatar FROM comment cm JOIN account ac ON cm.comment_user = ac.token_id WHERE cm.service_code = $service_code;";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		function check_access($id_comment) {
			if (current_account()) {
				$comment_user = current_account();
				$sql = "SELECT * FROM comment WHERE comment_user = '$comment_user' AND id_comment = '$id_comment';";
				$this->setQuery($sql);
				$result = $this->query();
				$row = mysql_fetch_assoc($result);
				if ($row) {
					return 1;
				}
			}
			return 0;
		}

		function delete($id_comment) {
			if ($this->check_access($id_comment)) {
				$comment_user = current_account();
				$sql = "DELETE FROM comment WHERE id_comment = '$id_comment' AND  comment_user = '$comment_user';";
				$this->setQuery($sql);
				return $this->query();
			}
			return -1;
		}
	}
 ?>