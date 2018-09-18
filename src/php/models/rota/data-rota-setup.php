<?php

class RotaDataSetup
{
	private $all_dates;

	function __construct()
	{
		$this->all_dates = read_json_file('data/json/rota-setup.json');
	}

	private function get_all()
	{
		return $this->all_dates;
	}

	private function get_periods_for_type($type)
	{
		return $this->all_dates[$type]['periods'];
	}

	private function get_period_for_type($type, $periodidx = 0)
	{
		return $this->get_periods_for_type($type)[$periodidx];
	}

	function get_periodname_for_type($type, $periodidx = 1)
	{

		return get_periodname_for_type($type, $periodidx);
		//echo $new_array['periodname'][0]. 'nfds';
		//return $this->get_period_for_type($type,$periodidx)['periodname'];
	}

	function get_dates_for_type_and_periodid($type, $periodidx = 0)
	{
		return $this->get_period_for_type($type, $periodidx)['dates'];
	}

	

}

?>