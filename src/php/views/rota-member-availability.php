<?php

class RotaMemberAvailabilityView
{
	private $colnames = array('Date', 'Available');
	private $avail;

	function __construct(&$member, $type)
	{
		$member_availability = $member->get_availability();
		$member_username = $member->get_username();
		$rota_dates = $member->get_all_dates($type);

		$count = 0;
		foreach($rota_dates as $d)
		{
			$this->avail[] = array(
				$d, 
				Comp_MaterialSwitch_switch(
					array(
						'id'      => $member_username.'-'.$type.'-avail-'.$count, 
						'checked' => in_array($d, $member_availability)
					)
				)
			);
			$count ++;
		}
	}

	function render()
	{
		$cls = new Table(
			array(
			  'colnames' => $this->colnames,
			  'rows' => $this->avail
			)
		);
		return $cls->render();
	}
	
}

?>