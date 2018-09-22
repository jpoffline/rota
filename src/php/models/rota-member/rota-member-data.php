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
		$this->username = get_username_for_userid($this->userid);
		$this->usernamefull = get_usernamefull_for_userid($this->userid);
	}

	function read_from_json()
	{
		$this->memberdata = $this->get_data_for_member($this->userid);
	}

	function username()
	{
		return $this->username;
	}

	function userid()
	{
		return $this->userid;
	}

	function usernamefull()
	{
		return $this->usernamefull;
	}

	function skills($rid)
	{
		$arr = get_skillids_for_rotaname_userid($rid,$this->userid);
		return $arr;
	}

	function availability($rota_type, $periodid)
	{
		return $this->get_datestate($this->userid, $rota_type, $periodid, 1);
	}

	function confirmed_dates($rota_type, $periodid)
	{
		return $this->get_datestate($this->userid, $rota_type, $periodid, 2);
	}

	function get_datestate($rota_type, $periodid, $availtypeid)
	{
		return get_availability_for_userid($this->userid, $rota_type, $periodid, $availtypeid);
	}

	



}


?>