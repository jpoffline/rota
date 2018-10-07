<?php

class RotaDB_periodstbl{
	
	function __construct($conn){
		$this->conn = $conn;
	}

	function get_all(){
		$sql = "SELECT * FROM periods 
			";
		return $this->conn->query($sql);
	}

	function get_all_for_rota($rotaname){
		$sql = "SELECT * FROM periods
		 INNER join rotas on rotas.rotaid = periods.rotaid
		 where rotas.rotaid = ".$rotaname."";
		return $this->conn->query($sql);
	}

	function add_period_for_rotaid($rotaid, $periodname){
		$sql = "INSERT INTO periods (rotaid, periodname) 
		VALUES (".$rotaid.",'".$periodname."')";
	}

}

?>