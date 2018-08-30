<?php

class RotaDataSetup
{
	private $all_dates;

	function __construct()
	{
		$this->all_dates = read_json_file('data/json/rota-setup.json');
	}

	function get_all()
	{
		return $this->all_dates;
	}

	function get_periods_for_type($type)
	{
		return $this->all_dates[$type]['periods'];
	}

	function get_period_for_type($type, $periodidx)
	{
		return $this->get_periods_for_type($type)[$periodidx];
	}

	function get_dates_for_type_and_periodid($type, $periodidx)
	{
		return $this->get_period_for_type($type, $periodidx)['dates'];
	}

	

}

?>