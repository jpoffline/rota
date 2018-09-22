<?php

class RotaDB_rotastbl
{
	private $conn;
	function __construct($conn){
		$this->conn = $conn;
	}
	function add_rota($rotaname, $teamname = ''){
		$sql = "INSERT INTO rotas (rotaname, groupname) VALUES ('".$rotaname."', '".$teamname."')";
		$this->conn->query($sql);
	}
	function get_all(){
		$sql = "select * from rotas";
		return $this->conn->query($sql);
	}

}

?>