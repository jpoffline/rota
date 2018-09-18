<?php

class RotaMemberData extends RotaMembers
{
	private $userid;
	private $username;
	private $usernamefull;
	function __construct($userid)
	{
		parent::__construct();
		$this->userid = $userid;
		//$this->read_from_json();
		$this->username = get_username_for_userid($this->userid);
		$this->usernamefull = get_usernamefull_for_userid($this->userid);
	}

	function read_from_json()
	{
		$this->memberdata = $this->get_data_for_member($this->userid);
	}

	function username()
	{
		return $this->username;//$this->memberdata['username'];
	}

	function usernamefull()
	{
		return $this->usernamefull;//$this->memberdata['usernamefull'];
	}

	function skills()
	{
		$arr = [];
		$arr['music'] = get_skillids_for_rotaname_userid('music',$this->userid);
		return $arr;
		//return $this->memberdata['skills'];
	}

	function availability($rota_type, $periodid)
	{
		return get_availability_for_userid($this->userid, $rota_type, $periodid);
		//return $this->memberdata['availability'][$rota_type.'-periodid-'.$periodid];
	}

	



}


?>