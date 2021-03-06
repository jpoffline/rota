<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: rota-db-interface.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


class RotaDBInterface
{
	private $servername;
	private $user;
	private $password;
	private $db;
	private $port;
	private $sqlconn;
	private $has_error = false;

	private $RotaDB_rotastbl;
	private $RotaDB_periodstbl;
	private $RotaDB_availabilitytypestbl;
	private $RotaDB_memberstbl;
	
	function __construct($org = 'shbc'){


		$SQLCONFIG = array(
			"servername" => 'localhost',
			"username"   => 'root',
			"password"   => 'root',
			"database"   => 'rota',
			"port"       => 8889
		);


		$this->set_sql_config($SQLCONFIG);

		$this->_create_db();
		$this->_connect_to_rota_sql();

		$this->RotaDB_rotastbl             = new RotaDB_rotastbl($this->sqlconn);
		$this->RotaDB_periodstbl           = new RotaDB_periodstbl($this->sqlconn);
		$this->RotaDB_availabilitytypestbl = new RotaDB_availabilitytypestbl($this->sqlconn);
		$this->RotaDB_memberstbl           = new RotaDB_memberstbl($this->sqlconn);
	}

	function set_sql_config($sqlconfig){
		$this->set_sql_server(  $sqlconfig['servername']);
		$this->set_sql_user(    $sqlconfig['username']);
		$this->set_sql_password($sqlconfig['password']);
		$this->set_sql_db(      $sqlconfig['database']);
		$this->set_sql_port(    $sqlconfig['port']);
	}

	function set_sql_server($sv){
		$this->servername = $sv;
	}
	function set_sql_user($usr){
		$this->user = $usr;
	}
	function set_sql_password($pwd){
		$this->password = $pwd;
	}
	function set_sql_db($db){
		$this->db = $db;
	}
	function set_sql_port($prt){
		$this->port = $prt;
	}
	

	function add_member(
		$new_username, 
		$new_firstname, 
		$new_lastname, 
		$new_rotamembership
	){
		$this->RotaDB_memberstbl->add_member(
			$new_username,
			$new_firstname,
			$new_lastname,
			$new_rotamembership
		);
	}

	function add_rota($rotaname, $teamname=''){
		$this->RotaDB_rotastbl->add_rota($rotaname, $teamname);
	}
	
	function get_all_rotas(){
		return $this->RotaDB_rotastbl->get_all();
	}

	function get_all_members(){
		return $this->RotaDB_memberstbl->get_all();
	}

	function get_periods_for_rota($rotaname){
		return $this->RotaDB_periodstbl->get_all_for_rota($rotaname);
	}

	function get_periods_for_rota_as_dropdown($rotaname, $did){
		$periods = $this->get_periods_for_rota($rotaname);
		return dropdown(
			$periods,
			'periodid',
			'periodname',
			$did
		);
	}

	function set_user_availabilty($opts, $newState = 1){

		$this->_set_update_db_data(
			'rotaavailability', 
			$opts, 
			$newState
		);
		
	}

	function set_user_skills($opts, $newState = 1){

		$this->_set_update_db_data(
			'memberskills', 
			$opts, 
			$newState
		);
		
	}

	function add_period_for_rotaid($rotaid,$periodname){
		$this->RotaDB_periodstbl->add_period_for_rotaid($rotaid, $periodname);
	}

	function get_periods(){
		return $this->RotaDB_periodstbl->get_all();
	}

	function get_all_availabilitytypes(){
		return $this->RotaDB_availabilitytypestbl->get_all();
	}
	
	private function _connect_to_rota_sql(){
		$this->sqlconn = new mysqli(
			$this->servername, 
			$this->user, 
			$this->password, 
			$this->db
		);
	}

	function get_sqlconn(){
		return $this->sqlconn;
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

	private function _set_update_db_data($tableName, $opts, $newState)
	{

		$this->sqlconn->query(
			$this->_get_update_db_data_qy(
				$tableName, 
				$newState, 
				namesGenerateDespatch($tableName), 
				deparseDespatch($tableName, $opts, $format = stateToFormat($newState))
			)
		);
		
	}

	private function _get_update_db_data_qy($tableName, $newState, $names, $opts)
	{
		if($newState == 1)
		{
			$qy = sqlfactory_insert($tableName, $names, $opts);
		}
		else if($newState == 0)
		{
			$qy = sqlfactory_delete($tableName, $opts);
		}
		else
		{
			writeToLog('INVALID newState: '. $newState);
		}
		writeToLog($qy);
		return $qy;
	}

}

function stateToFormat($newState)
{
	if($newState == 0)
	{
		$fmt = "sep-and";
	}
	else if($newState == 1)
	{
		$fmt = "csv";
	}
	else
	{
		writeToLog('INVALID newState: '. $newState);
	}
	return $fmt;
}

function deparseDespatch($type, $opts, $format)
{
	if($type == "rotaavailability")
	{
		return deparseAvailabilityString($opts, $format);
	}
	else if($type == "memberskills")
	{
		return deparseSkillsString($opts, $format);
	}
	else
	{
		writeToLog('INVALID deparseDespatch type: '. $type);
	}
}

function namesGenerateDespatch($type)
{
	if($type == "rotaavailability")
	{
		return namesAvailabilityString();
	}
	else if($type == "memberskills")
	{
		return namesSkillsString();
	}
	else
	{
		writeToLog('INVALID namesGenerateDespatch type: '. $type);
	}
}

?>