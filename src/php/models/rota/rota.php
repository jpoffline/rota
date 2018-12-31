<?php

class Rota
{
	
	private $_periodidx;
	function __construct()
	{
		$this->rotadates  = new RotaDataSetup();
		$this->skillsdata = new SkillsDataSetup();
		$this->_periodidx = 1;
	}

	function set_periodidx($pid){
		$this->_periodidx = $pid;
	}

	function get_period_name($typeid)
	{
		return $this->rotadates->get_periodname_for_type($typeid,$this->_periodidx);
	}

	function get_all_dates($type)
	{
		return $this->rotadates->get_dates_for_type_and_periodid($type,$this->_periodidx);
	}

	function get_all_skills($type)
	{
		return $this->skillsdata->get_skills_for_type($type);
	}

	

}

?>