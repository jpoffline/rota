<?php

class CompileRotaOptions
{

	private $all_dates;
	private $resources;
	private $skills;
	

	function __construct()
	{
		$this->type = 'music';
		$this->skills    = read_json_file('data/json/skills-setup.json')['skills'][0][$this->type];
		$this->resources = read_json_file('data/json/rota-members.json')['rotamembers'];
		$this->all_dates = read_json_file('data/json/rota-setup.json')[$this->type]['periods'][0]['dates'];
	}

	function get_colnames()
	{
		$colnames = array();
		$colnames[] = 'date';
		foreach($this->skills as $s)
		{
			$colnames[] = $s['title'];
		}
		return $colnames;
	}

	function get_compiled_rota()
	{
		$who = $this->who_available_when();
		$data = array();
		foreach($who as $dd)
		{
			$row = array();
			$row[] = $dd['date'];
			foreach($dd['skill'] as $d)
			{
				$row[] = $d;
			}
			$data[] = $row;
		}
		return $data;
	}

	private function who_available_when()
	{
		$type = $this->type;
		$periodid = '1';
		$empty = '-';
		$delim = ' ';
		$data = array();
		foreach($this->all_dates as $date)
		{
			$row = array();
			$row['date'] = $date;
			$row['people'] = array();
			$row['skill'] = array();
			foreach($this->skills as $s)
			{
				$row['skill'][$s['skillid']] = $empty;
			}

			foreach($this->resources as $resource)
			{
				if(in_array($date, $resource['availability'][$type.'-periodid-'.$periodid]))
				{
					$row['people'][] = $resource['username'];
					foreach($this->skills as $a)
					{
						if(in_array($a['skillid'], $resource['skills'][$type]))
						{
							$resource_toprint = '<button id="cro">'.$resource['username'].'</button>';

							if($row['skill'][$a['skillid']] !=$empty)
							{
								$row['skill'][$a['skillid']].= $delim.$resource_toprint;
							}
							else
							{
								$row['skill'][$a['skillid']]= $resource_toprint;
							}
						}
					}
				}
			}
			$data[] = $row;
		}
		
		return $data;
	}

	
	
	
}


?>