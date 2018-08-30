<?php

class Rota
{
	
	function __construct()
	{
		$this->rotadates  = new RotaDataSetup();
		$this->skillsdata = new SkillsDataSetup();
	}

	function get_period_name($type)
	{
		return $this->rotadates->get_period_for_type($type, 0)['periodname'];
	}

	function get_all_dates($type)
	{
		return $this->rotadates->get_dates_for_type_and_periodid($type, 0);
	}

	function get_all_skills($type)
	{
		return $this->skillsdata->get_skills_for_type($type);
	}

	

}

?>