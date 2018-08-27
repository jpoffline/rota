<?php

class RotaMemberData
{
	private $userid;
	function __construct($userid)
	{
		$this->userid = $userid;
	}

	function read_from_json()
	{
		$fn = 'data/json/rota-members.json';
		$membersdata = read_json_file($fn)['rotamembers'];
		foreach($membersdata as $m)
		{
			if($m['userid'] == $this->userid)
			{
				$this->memberdata = $m;
				break;
			}
		}
		return $this->memberdata;
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