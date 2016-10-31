<?php 
	require_once PATH_MODEL."database.php";

	class service extends database
	{
		function get_all_type_service() {
			$sql = "SELECT * FROM `service_type` ";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while($row = mysql_fetch_assoc($result)) {
				$arr[] = $row;
			}
			return $arr;
		}

		function get_data_service_by_type($type) {
			$sql = "SELECT sv.id_service, svt.name type, pn.name, sv.house_number, st.name street, w.name ward, dt.name district, pv.name province, sv.website, sv.kinhdo, sv.vido, sv.remark
				FROM service sv 
					INNER JOIN service_type svt ON sv.service_code = svt.id_service_type
				    INNER JOIN place_name pn on sv.place_name_code = pn.id_place_name
				    INNER JOIN street st on sv.street_code = st.id_street
				    INNER JOIN ward w on sv.ward_code = w.id_ward
				    INNER JOIN district dt on sv.district_code = dt.id_district
				    INNER JOIN province pv on sv.province_code = pv.id_province
				WHERE sv.service_code = '$type';";

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