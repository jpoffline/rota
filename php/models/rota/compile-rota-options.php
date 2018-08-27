<?php

class CompileRotaOptions
{

	private $all_dates;
	private $resources;
	private $skills;
	

	function __construct()
	{
		$this->skills    = read_json_file('data/json/skills-setup.json')['skills'][0]['music'];
		$this->resources = read_json_file('data/json/rota-members.json')['rotamembers'];
		$this->all_dates = read_json_file('data/json/rota-setup.json')['music']['periods'][0]['dates'];

		$who = $this->who_available_when();
		
		foreach($who as $dd)
		{
			foreach($dd as $d)
			{
				echo $d. ' ';
			}
			echo '<br>';
		}
	}

	function who_available_when()
	{
		$data = array();
		foreach($this->all_dates as $date)
		{
			$row = array();
			$row[] = $date;
			foreach($this->resources as $resource)
			{
				if(in_array($date, $resource['availability']['music-periodid-1']))
				{
					$row[] = $resource['username'];
					
				}
			}
			$data[] = $row;
		}
		
		return $data;
	}
	
	
	
}


?>