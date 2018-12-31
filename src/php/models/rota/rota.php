<?php

class Rota
{
	
	private $_periodidx;
	private $_rotaidx;
	function __construct()
	{
		$this->rotadates  = new RotaDataSetup();
		$this->skillsdata = new SkillsDataSetup();
		$this->_periodidx = 1;
		$this->_rotaidx = 1;
	}

	function set_periodidx($pid){
		$this->_periodidx = $pid;
	}
	function set_rotaidx($rid){
		$this->_rotaidx = $rid;
	}

	function get_period_name($typeid)
	{
		return $this->rotadates->get_periodname_for_type($this->_rotaidx, $this->_periodidx);
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