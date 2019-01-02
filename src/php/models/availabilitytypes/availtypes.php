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
	private $icons;
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
			$this->btns[$s['availtypeid']]         = $s['badgecolour'];
			$this->icons[$s['availtypeid']]        = $s['icon'];
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

	function icon($typeid)
	{
		return $this->icons[$typeid];
	}

	function string($typeid)
	{
		return $this->availtypeids[$typeid];
	}

	function all_names()
	{
		return $this->availtypeids;
	}

	function id_for_name($name)
	{
		foreach($this->availtypeids as $id => $type)
		{
			if($type == $name)
			{
				return $id;
			}
		}
	}

}

?>