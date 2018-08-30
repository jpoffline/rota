<?php

class RotaMembers
{
	private $fn = 'data/json/rota-members.json';
	function __construct()
	{
		$this->membersdata = read_json_file($this->fn)['rotamembers'];
	}

	function get_data_for_member($id)
	{
		foreach($this->membersdata as $m)
		{
			if($m['userid'] == $id)
			{
				return $m;
			}
		}
	}
}
?>