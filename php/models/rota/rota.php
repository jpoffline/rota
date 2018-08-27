<?php

class Rota
{
	private $all_dates;
	private $all_skills;

	function __construct()
	{
		$this->all_dates = read_json_file('data/json/rota-setup.json');
		$this->json_a = read_json_file('data/json/skills-setup.json');
	}

	function get_period_name($type)
	{
		return $this->all_dates[$type]['periods'][0]['periodname'];
	}

	function get_all_dates($type)
	{
		return $this->all_dates[$type]['periods'][0]['dates'];
	}

	function get_all_skills($type)
	{
		return $this->json_a['skills'][0][$type];
	}

	

}

?>