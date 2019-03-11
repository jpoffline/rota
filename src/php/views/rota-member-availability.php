<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: rota-member-availability.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


class RotaMemberAvailabilityView
{
	private $colnames = array('Date');
	private $avail;
	private $dates_down;

	private $availtypesdata;
	
	function __construct(&$member, $rotaid)
	{
		$this->availtypesdata = new AvailabilityTypesData();
		$this->colnames = array_merge($this->colnames, array('unavailable'));
		
		$this->id_avail   = $this->availtypesdata->id_for_name('available');
		$this->id_confd   = $this->availtypesdata->id_for_name('confirmed');
		$this->id_unavail = $this->availtypesdata->id_for_name('unavailable');
		
		$this->member_availability = $member->get_datedate($this->id_avail);
		$this->member_confirmed    = $member->get_datedate($this->id_confd);
		$this->member_unavailable  = $member->get_datedate($this->id_unavail);
		
		
		$this->member_userid       = $member->get_userid();
		
		$rota_dates                = $member->get_all_dates($rotaid);
		
		$this->rotaid = $rotaid;
		$this->periodid = $member->periodid;

		

		foreach($rota_dates as $date)
		{
			$this->avail[] = $this->_generate_avail_row($date);

			if(in_array($date['date'], $this->member_confirmed))
			{
				$this->dates_down[] = $date['date'];
			}

		}
	}

	function get_dates_down()
	{
		return implode(',',$this->dates_down);
	}


	private function _generate_avail_row($date)
	{
		$date_str = $date['date'];
		$date_id  = $date['dateid'];
		$row = array(
			
			$date_str, 

			Comp_MaterialSwitch_switch(
				array(
					'id'      => $this->_gen_avail_id($date_id, $this->id_unavail),
					'checked' => in_array($date_str, $this->member_unavailable)
				)
			)
			
		);
		return $row;
	}

	private function _gen_avail_id($date_id, $avail_id)
	{
		return generateAvailabilityString(
				$this->rotaid,
				$this->periodid,
				$this->member_userid,
				$date_id,
				$avail_id
		);
		
	}

	function render()
	{
		$cls = new Table(
			array(
			  'colnames' => $this->colnames,
			  'rows'     => $this->avail
			)
		);
		return $cls->render();
	}
	
}

?>