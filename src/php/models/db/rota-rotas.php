<?php

class RotaDB_rotastbl
{
	private $conn;
	function __construct($conn){
		$this->conn = $conn;
	}
	function add_rota($rotaname){
		$sql = "INSERT INTO rotas (rotaname) VALUES ('".$rotaname."')";
		$this->conn->query($sql);
	}
	function get_all(){
		$sql = "select * from rotas";
		return $this->conn->query($sql);
	}

}

?>