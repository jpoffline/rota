<?php

function GetRotaSQLconn()
{
	$cls = new RotaDBInterface();
	return $cls->get_sqlconn();
}



function SQL_deltbl($conn, $tbl){
	$sql = "IF OBJECT_ID('dbo.".$tbl."', 'U') IS NOT NULL DROP TABLE ".$tbl .";";
	$sql = "DROP TABLE IF EXISTS ".$tbl;
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table ".$tbl." deleted successfully"."<br>";
	}
	else {
		//e		cho "Error deleting ".$tbl.": " . $conn->error."<br>";
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
	
	// 	sql to create table
	$conn = GetRotaSQLconn();
	
	SQL_deltbl($conn, "members");
	SQL_deltbl($conn, "rotas");
	SQL_deltbl($conn, "periods");
	SQL_deltbl($conn, "dateperiods");
	SQL_deltbl($conn, "rotamembership");
	SQL_deltbl($conn, "memberskills");
	SQL_deltbl($conn, "skillstypes");
	SQL_deltbl($conn, "rotaavailability");
	
	SQL_deltbl($conn, "availabilitytypes");
	
	
	$sql = "CREATE TABLE IF NOT EXISTS members (
	userid INT unsigned AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL
	)";
	
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table members created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS rotas (
		rotaid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		rotaname VARCHAR(30) NOT NULL,
		groupname VARCHAR(30)
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table rotas created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS periods (
		periodid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		periodname VARCHAR(30) NOT NULL,
		rotaid INT NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table periods created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	
	
	$sql = "CREATE TABLE IF NOT EXISTS dateperiods (
		dateid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		periodid INT unsigned NOT NULL,
		datestr VARCHAR(30) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table dateperiods created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	
	$sql = "CREATE TABLE IF NOT EXISTS rotamembership (
		rotaid INT unsigned,
		userid INT unsigned
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table rotamembership created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS memberskills (
		userid  INT unsigned NOT NULL,
		skillid INT unsigned NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table rotamembership created memberskills";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS skillstypes (
		skillid   INT unsigned AUTO_INCREMENT PRIMARY KEY,
		rotaid    INT UNSIGNED NOT NULL,
		skillname VARCHAR(30) NOT NULL,
		skillicon VARCHAR(30)
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table skillstypes created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	$sql = "CREATE TABLE IF NOT EXISTS rotaavailability (
		rotaid      INT UNSIGNED NOT NULL,
		userid      INT UNSIGNED NOT NULL,
		dateid      INT UNSIGNED NOT NULL,
		periodid    INT UNSIGNED NOT NULL,
		availtypeid INT UNSIGNED NOT NULL,
		datechange  TIMESTAMP
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table rotaavailability created successfully";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS availabilitytypes (
		availtypeid INT unsigned AUTO_INCREMENT PRIMARY KEY,
		availtype   VARCHAR(30) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		//e		cho "Table rotamembership created memberskills";
	}
	else {
		//e		cho "Error creating table: " . $conn->error;
	}
	
	
	
}


function list_availability_for_user_rota_period(
	$userid, 
	$rotaid, 
	$periodid,
	$availtypeid
){
	$sql = "SELECT 
		rotaname, 
		username, 
		members.userid, 
		datestr AS available, 
		periodname,
		availtypeid
		FROM rotaavailability 
		INNER JOIN members     ON members.userid = rotaavailability.userid 
		INNER JOIN rotas       ON rotas.rotaid = rotaavailability.rotaid 
		INNER JOIN dateperiods ON dateperiods.dateid = rotaavailability.dateid 
							  AND dateperiods.periodid = rotaavailability.periodid 
		INNER JOIN periods     ON periods.periodid = rotaavailability.periodid 
		WHERE 
			members.userid = '".$userid."' AND 
			rotas.rotaid   = ".$rotaid." AND 
			periods.periodid = ".$periodid ." AND
			availtypeid = ".$availtypeid."";
	$conn = GetRotaSQLconn();
	$v =  $conn->query($sql);
	$new_array = [];
	
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['available'];
	}
	return $new_array;
}

function list_skills_for_rota($rotaid){
	$sql = "SELECT 
	skillname as title, 
	skillid as skillid 
	FROM skillstypes 
	INNER JOIN rotas on rotas.rotaid = skillstypes.rotaid 
	where rotas.rotaid = ".$rotaid;
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

function get_availability_for_userid($userid, $rotaname, $periodid, $availtypeid=1){
	$sql = "SELECT datestr FROM rotaavailability
	INNER JOIN rotas ON rotas.rotaid = rotaavailability.rotaid
	INNER JOIN dateperiods ON rotaavailability.dateid = dateperiods.dateid
	WHERE userid = ".$userid." 
	AND rotas.rotaid = ".$rotaname." 
	AND rotaavailability.periodid = ".$periodid. "
	AND availtypeid = ".$availtypeid."";
	
	$conn = GetRotaSQLconn();
	$v =  $conn->query($sql);
	$new_array = [];
	
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['datestr'];
	}
	return $new_array;
}

function get_skillids_for_rotaname_userid($rotaid, $userid){
	$sql = "SELECT 
	skillstypes.skillid as skillid 
	from rota.memberskills
	inner join rota.skillstypes on memberskills.skillid = skillstypes.skillid
	inner join rota.rotas on rotas.rotaid = skillstypes.rotaid
	where userid = ".$userid." and rotas.rotaid = ".$rotaid."";
	$conn = GetRotaSQLconn();
	$v =  $conn->query($sql);
	$new_array = [];
	
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['skillid'];
	}
	return $new_array;
}

function get_periodname_for_type($rotaid, $periodidx){
	$sql = "SELECT periodname FROM periods 
		inner join rotas ON rotas.rotaid = periods.rotaid 
		WHERE rotas.rotaid = ".$rotaid." AND periodid = ".$periodidx;
	$conn = GetRotaSQLconn();
	
	$v =  $conn->query($sql);
	$new_array = [];
	while( $row = $v->fetch_assoc()){
		return $row['periodname'];
		$new_array[] = $row;
		// 		Inside while loop
	}
}

function get_groupname_for_rota($rotaid){
	$sql = "select groupname from rotas where rotaid=".$rotaid.";";
	$conn = GetRotaSQLconn();
	
	$v =  $conn->query($sql);
	$new_array = [];
	while( $row = $v->fetch_assoc()){
		return $row['groupname'];
		$new_array[] = $row;
		// 		Inside while loop
	}
}

function get_rotaname_for_rota($rotaid){
	$sql = "select rotaname from rotas where rotaid=".$rotaid.";";
	$conn = GetRotaSQLconn();
	
	$v =  $conn->query($sql);
	$new_array = [];
	while( $row = $v->fetch_assoc()){
		return $row['rotaname'];
		$new_array[] = $row;
	}
}

function get_skillids_for_username_in_rota($userid, $rotaid){
	$sql = "SELECT 
	memberskills.skillid 
	FROM rotamembership
	INNER JOIN memberskills ON rotamembership.userid = memberskills.userid
    INNER JOIN members      ON rotamembership.userid = members.userid
    INNER JOIN rotas        ON rotamembership.rotaid = rotas.rotaid
    WHERE 
	rotas.rotaid = ".$rotaid." 
	AND rotamembership.userid = ".$userid;

	$conn = GetRotaSQLconn();
	$new_array = [];
	$v =  $conn->query($sql);
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['skillid'];
	}
	return $new_array;
}

function get_userids_for_period_in_rotaid($periodid, $rotaid){
	$sql = "SELECT distinct(rotaavailability.userid) as userids
	FROM rotaavailability
	INNER join rotas on rotas.rotaid = rotaavailability.rotaid
	INNER join periods on periods.periodid = rotaavailability.periodid
	where periods.periodid=".$periodid."
	and rotas.rotaid = ".$rotaid."";
	
	$conn = GetRotaSQLconn();
	$new_array = [];
	$v =  $conn->query($sql);
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row['userids'];
	}
	return $new_array;
}

function get_dates_for_rota_periodid($periodid, $rotaid){
	$sql = "SELECT 
	dateperiods.datestr AS date, 
	dateperiods.dateid AS dateid 
	FROM dateperiods
	INNER JOIN periods on periods.periodid = dateperiods.periodid 
	INNER JOIN rotas on rotas.rotaid = periods.rotaid
	WHERE
	rotas.rotaid = '".$rotaid."' and
	dateperiods.periodid = ".$periodid;

	$conn = GetRotaSQLconn();
	$new_array = [];
	$v =  $conn->query($sql);
	while( $row = $v->fetch_assoc()){
		$new_array[] = $row;
	}
	return $new_array;
}



?>