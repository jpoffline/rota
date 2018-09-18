<?php

class RotaDB_dateperiodstbl{
	
	function __construct($conn){
		$this->conn = $conn;
	}

	function add_date_for_periodid($periodid, $date){
		$sql = "INSERT INTO dateperiods (periodid, datestr) 
		VALUES (".$periodid.",'".$date."')";
	}

}
?>