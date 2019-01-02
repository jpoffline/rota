<?php

class RotaDB_availabilitytypestbl{
	
	function __construct($conn){
		$this->conn = $conn;
	}

	function get_all(){
		$sql = "SELECT availtypeid,availtype, badgecolour, icon FROM availabilitytypes";
		
		return $this->conn->query($sql);
	}


}

?>