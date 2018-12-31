<?php

class RotaDataSetup
{
	private $all_dates;

	function __construct()
	{

	}

	function get_periodname_for_type($rotaid, $periodidx = 1)
	{
		return get_periodname_for_type($rotaid, $periodidx);
	}

	function get_dates_for_type_and_periodid($rotaid, $periodidx = 1)
	{
		return get_dates_for_rota_periodid($periodidx,$rotaid);
	}

	

}

?>