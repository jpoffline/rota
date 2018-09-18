<?php

function GetRotaSQLconn()
{
	$servername = "localhost";
	$user      = 'root';
	$password = 'root';
	$db       = 'rota';
	$host     = 'localhost';
	$port     = 8889;
	
	return new mysqli($servername, $user, $password, $db);
}

function RotaSQL_setupbd(){
	
	$servername = "localhost";
	$user      = 'root';
	$password = 'root';
	$db       = 'rota';
	$host     = 'localhost';
	$port     = 8889;
	
	$conn = new mysqli($servername, $user, $password);
	// 	Create database
		$sql = "CREATE DATABASE IF NOT EXISTS ". $db;
	if ($conn->query($sql) === TRUE) {
		//echo "Database created successfully";
	}
	else {
		//echo "Error creating database: " . $conn->error;
	}
}

function SQL_deltbl($conn, $tbl){
	$sql = "IF OBJECT_ID('dbo.".$tbl."', 'U') IS NOT NULL DROP TABLE ".$tbl .";"; 
  $sql = "DROP TABLE IF EXISTS ".$tbl;
  if ($conn->query($sql) === TRUE) {
	//echo "Table ".$tbl." deleted successfully"."<br>";
} else {
	//echo "Error deleting ".$tbl.": " . $conn->error."<br>";
} 
}

function RotaSQL_setuptbls()
{

	/*

	members
	rotas
	periods
	dateperiods
	rotamembership
	memberskills
	skillstypes
	rotaavailability
	*/

	// sql to create table
	$conn = GetRotaSQLconn();

	SQL_deltbl($conn, "members");
	SQL_deltbl($conn, "rotas");
	SQL_deltbl($conn, "periods");
	SQL_deltbl($conn, "dateperiods");
	SQL_deltbl($conn, "rotamembership");
	SQL_deltbl($conn, "memberskills");
	SQL_deltbl($conn, "skillstypes");
	SQL_deltbl($conn, "rotaavailability");


	$sql = "CREATE TABLE IF NOT EXISTS members (
	userid INT UNSIGNED,
	username VARCHAR(30) NOT NULL,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL
	)";
	
	if ($conn->query($sql) === TRUE) {
		//echo "Table members created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS rotas (
		rotaid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		rotaname VARCHAR(30) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table rotas created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS periods (
		periodid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		periodname VARCHAR(30) NOT NULL,
		rotaid INT NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table periods created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	

	$sql = "CREATE TABLE IF NOT EXISTS dateperiods (
		dateid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		periodid INT unsigned NOT NULL,
		datestr VARCHAR(30) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table dateperiods created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	
	$sql = "CREATE TABLE IF NOT EXISTS rotamembership (
		rotaid INT unsigned,
		userid INT unsigned
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table rotamembership created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS memberskills (
		userid INT unsigned NOT NULL,
		skillid INT unsigned NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table rotamembership created memberskills";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS skillstypes (
		skillid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		rotaid INT UNSIGNED NOT NULL,
		skillname VARCHAR(30) NOT NULL,
		skillicon VARCHAR(30)
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table skillstypes created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS rotaavailability (
		rotaid INT UNSIGNED NOT NULL,
		userid INT UNSIGNED NOT NULL,
		dateid INT UNSIGNED NOT NULL,
		periodid INT UNSIGNED NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//echo "Table rotaavailability created successfully";
	} else {
		//echo "Error creating table: " . $conn->error;
	}

	

}

function RotaSQL_setDummyInfo()
{
	$conn = GetRotaSQLconn();


	// Some members
	$conn->query("INSERT INTO members (userid, username, firstname, lastname) VALUES (1,'jp', 'Jonathan', 'Pearson')");
	$conn->query("INSERT INTO members (userid, username, firstname, lastname) VALUES (2,'mb', 'Matt', 'Burgin')");
	$conn->query("INSERT INTO members (userid, username, firstname, lastname) VALUES (3,'ab', 'Anna', 'Burgin')");
	$conn->query("INSERT INTO members (userid, username, firstname, lastname) VALUES (4,'ip', 'Iona', 'Pearson')");
	
	// Some rotas
	$conn->query("INSERT INTO rotas (rotaname) VALUES ('music')");
	$conn->query("INSERT INTO rotas (rotaname) VALUES ('juniorchurch')");
	
	// Define some period names
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (1,'Winter 2018')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (1,'Spring 2019')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (2,'Winter 2018')");
	$conn->query("INSERT INTO periods (rotaid, periodname) VALUES (2,'Spring 2019')");
	
	// Define dates for periods
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'02/09/2018')");
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'09/09/2018')");
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'16/09/2018')");
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'23/09/2018')");
	$conn->query("INSERT INTO dateperiods (periodid, datestr) VALUES (1,'30/09/2018')");
	
	// Link members to rotas
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,1)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (2,1)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (2,4)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,2)");
	$conn->query("INSERT INTO rotamembership (rotaid, userid) VALUES (1,3)");

	// Define a list of skills
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Sound',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Piano',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Voice',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Voice - lead',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Guitar - backing',1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Guitar - lead', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Bass guitar', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Drums', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Percussion', 1)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Leader', 2)");
	$conn->query("INSERT INTO skillstypes (skillname, rotaid) VALUES ('Helper', 2)");

	// Link skills to members
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,1)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,7)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,4)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,6)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,7)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (2,8)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (3,2)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (3,3)");

	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (4,10)");
	$conn->query("INSERT INTO memberskills (userid, skillid) VALUES (1,11)");

	// Declare availability for users on rotas.
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,1,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,1,2,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,1,3,1)");

	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,2,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,2,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,2,4,1)");

	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,3,1,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,3,3,1)");
	$conn->query("INSERT INTO rotaavailability (rotaid, userid, dateid, periodid) VALUES (1,3,5,1)");

}

function list_availability_for_user_rota_period($username, $rotaname, $periodname){
	$sql = "SELECT rotaname, username, members.userid, datestr AS available, periodname FROM rotaavailability 
		INNER JOIN members ON members.userid = rotaavailability.userid 
		INNER JOIN rotas ON rotas.rotaid = rotaavailability.rotaid 
		INNER JOIN dateperiods ON dateperiods.dateid = rotaavailability.dateid AND dateperiods.periodid = rotaavailability.periodid 
		INNER JOIN periods ON periods.periodid = rotaavailability.periodid 
		WHERE 
			members.username = '".$username."' AND 
			rotas.rotaname = '".$rotaname."' AND 
			periods.periodname = '".$periodname."'";
}

function list_skills_for_rota($rotaname){
	$sql = "SELECT skillname as title, skillid as skillid FROM skillstypes 
	INNER JOIN rotas on rotas.rotaid = skillstypes.rotaid 
	where rotaname = '".$rotaname."'";
	$conn = GetRotaSQLconn();
	return $conn->query($sql);
}

function sql_get_one($conn, $sql, $col){
	$v =  $conn->query($sql);
	$new_array = [];
	while( $row = $v->fetch_assoc()){
		return $row[$col];
	}
}

function get_usernamefull_for_userid($userid){
	$sql = "SELECT firstname as usernamefull from members WHERE userid = '".$userid."'";
	$conn = GetRotaSQLconn();
	return sql_get_one($conn, $sql, 'usernamefull');
}

function get_username_for_userid($userid){
	$sql = "SELECT username from members WHERE userid = '".$userid."'";
	$conn = GetRotaSQLconn();
	return sql_get_one($conn, $sql, 'username');
}

function get_availability_for_userid($userid, $rotaname, $periodid){
	$sql = "select datestr from rotaavailability
	inner join rotas on rotas.rotaid = rotaavailability.rotaid
	inner join dateperiods on rotaavailability.dateid = dateperiods.dateid
	where userid = ".$userid." and rotaname = '".$rotaname."' and rotaavailability.periodid = ".$periodid;
	
	$conn = GetRotaSQLconn();
	$v =  $conn->query($sql);
	$new_array = [];
	
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['datestr'];
	}
	return $new_array;
}

function get_skillids_for_rotaname_userid($rotaname, $userid){
	$sql = "select skillstypes.skillid as skillid from rota.memberskills
	inner join rota.skillstypes on memberskills.skillid = skillstypes.skillid
	inner join rota.rotas on rotas.rotaid = skillstypes.rotaid
	where userid = ".$userid." and rotaname = '".$rotaname."'";
	$conn = GetRotaSQLconn();
	$v =  $conn->query($sql);
	$new_array = [];
	
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['skillid'];
	}
	return $new_array;
}

function get_periodname_for_type($type, $periodidx){
	$sql = "SELECT periodname FROM periods inner join rotas on rotas.rotaid = periods.rotaid where rotaname = '".$type."' and periodid = ".$periodidx;
	$conn = GetRotaSQLconn();
	
	$v =  $conn->query($sql);
	$new_array = [];
	while( $row = $v->fetch_assoc()){
		return $row['periodname'];
		$new_array[] = $row; // Inside while loop
	}
}

?>