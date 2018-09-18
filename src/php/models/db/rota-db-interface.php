<?php

class RotaDBInterface
{
	private $servername = "localhost";
	private $user      = 'root';
	private $password = 'root';
	private $db       = 'rota';
	private $host     = 'localhost';
	private $port     = 8889;
	private $sqlconn;
	private $has_error = false;

	private $RotaDB_rotastbl;
	private $RotaDB_periodstbl;
	
	function __construct($org = 'shbc'){
		
		$this->_create_db();
		$this->_connect_to_rota_sql();

		$this->RotaDB_rotastbl = new RotaDB_rotastbl($this->sqlconn);
		$this->RotaDB_periodstbl = new RotaDB_periodstbl($this->sqlconn);
	}

	function add_rota($rotaname){
		$this->RotaDB_rotastbl->add_rota($rotaname);
	}
	
	function get_all_rotas(){
		return $this->RotaDB_rotastbl->get_all();
	}

	function get_periods_for_rota($rotaname){
		return $this->RotaDB_periodstbl->get_all_for_rota($rotaname);
	}
	
	private function _connect_to_rota_sql(){
		$this->sqlconn = new mysqli(
			$this->servername, 
			$this->user, 
			$this->password, 
			$this->db
		);
	}

	private function _create_db()
	{
		$conn = new mysqli($this->servername, $this->user, $this->password);
		// 	Create database
		$sql = "CREATE DATABASE IF NOT EXISTS ". $this->db;
		if ($conn->query($sql) === TRUE) {
			
		}
		else {
			$this->has_error = true;
		}
	}
}


?>