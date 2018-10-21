<?php

class RotaDB_memberstbl{
	
	function __construct($conn){
		$this->conn = $conn;
	}

	function get_all(){
		$sql = "SELECT members.userid, members.username, CONCAT(members.firstname, ' ', members.lastname) as name, rotas.rotaname FROM members
		INNER join rotamembership on rotamembership.userid = members.userid
		INNER JOIN rotas on rotas.rotaid = rotamembership.rotaid
		order by members.userid asc
		";
		return $this->conn->query($sql);
	}

	function add_member(
		$new_username, 
		$new_firstname, 
		$new_lastname, 
		$new_rotamembership
	){
		$sql = "INSERT INTO members (username, firstname, lastname) 
		VALUES ('".$new_username."', '".$new_firstname."', '".$new_lastname."')";
		$this->conn->query($sql);
		$id = $this->conn->insert_id;
		
		foreach($new_rotamembership as $rotaid)
		{
			$sql = "INSERT INTO rotamembership (rotaid, userid) VALUES (".$rotaid.",".$id.")";
			$this->conn->query($sql);
		}
	}


}

?>