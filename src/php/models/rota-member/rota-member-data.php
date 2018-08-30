<?php

class RotaMemberData extends RotaMembers
{
	private $userid;
	function __construct($userid)
	{
		parent::__construct();
		$this->userid = $userid;
		$this->read_from_json();
	}

	function read_from_json()
	{
		$this->memberdata = $this->get_data_for_member($this->userid);
	}

	function username()
	{
		return $this->memberdata['username'];
	}

	function usernamefull()
	{
		return $this->memberdata['usernamefull'];
	}

	function skills()
	{
		return $this->memberdata['skills'];
	}

	function availability($rota_type, $periodid)
	{
		return $this->memberdata['availability'][$rota_type.'-periodid-'.$periodid];
	}

	



}


?>