<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: availtypes.php
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

class AvailabilityTypesData
{
	private $data;
	private $availtypeids;
	private $btns;
	function __construct()
	{
		$this->_load();
	}

	private function _load()
	{
		$this->data = get_all_availablity_types();
		$this->availtypeids = [];

		foreach($this->data as $s)
		{
			$this->availtypeids[$s['availtypeid']] = $s['availtype'];
			$this->btns[$s['availtypeid']] = $s['btn'];
		}
		
	}

	function button($typeid)
	{
		// Get the button name for a given
		// availability type ID.
		return $this->btns[$typeid];
	}

	function typeids()
	{
		// Get a list of the available
		// availablity type IDs.
		return array_keys($this->availtypeids);
	}


}

?>