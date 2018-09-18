<?php

class RotaDBInterface
{

	private $sqlconn;

	function __construct()
	{
		
	}

	private function GetRotaSQLconn()
	{
		$servername = "localhost";
		$user      = 'root';
		$password = 'root';
		$db       = 'rota';
		$host     = 'localhost';
		$port     = 8889;
		
		//return new mysqli($servername, $user, $password, $db);
		$this->sqlconn = new mysqli($servername, $user, $password, $db);
	}
}


?>