<?php


class RotaMember extends Rota
{

	function __construct($userid, $periodid, $rotatype)
	{
		parent::__construct();
		
		$this->userid = $userid;
		$this->rota_type = $rotatype;
		$this->periodid = $periodid;
		$this->load_memberdata();
	}

	private function load_memberdata()
	{
		$mbd = new RotaMemberData($this->userid);
		$this->memberdata = $mbd->read_from_json();
		$this->username = $mbd->username();
		$this->usernamefull = $mbd->usernamefull();
		$this->skills = $mbd->skills();
		$this->availability = $mbd->availability($this->rota_type, $this->periodid);
	}



	function num_days_available()
	{
		return count($this->availability);
	}

	function get_skills($type)
	{
		return $this->skills[$type];
	}

	function get_availability()
	{
		return $this->availability;
	}

	function get_username()
	{
		return $this->username;
	}

	function get_usernamefull()
	{
		return $this->usernamefull;
	}

	function get_rota_type()
	{
		return $this->rota_type;
	}

	function render_availability()
	{
		$view_avail = new RotaMemberAvailabilityView(
			$this,$this->rota_type
		);
		return $view_avail->render();
	}

	function render_skills()
	{
		$view_skills = new RotaMemberSkillsView(
			$this, $this->rota_type
		);
		return $view_skills->render();
	}

}

?>