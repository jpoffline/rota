<?php

class SkillsDataSetup
{
	private $data;

	function __construct()
	{
		//$this->data = read_json_file('data/json/skills-setup.json');
	}

	function get_skills_for_type($type)
	{
		return list_skills_for_rota($type);//$this->data['skills'][0][$type];
	}

	

}

?>