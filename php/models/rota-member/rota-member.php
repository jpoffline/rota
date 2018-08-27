<?php


class RotaMember extends Rota
{
	private $username = 'jp';
	private $userid = 1;
	private $usernamefull = 'Jonathan Pearson';
	private $availability = array(
		"01/03/2018", "21/03/2018"
	);
	private $skills = array(
		'music'=> array(1, 7)
	);
	private $rota_type = 'music';

	function __construct()
	{

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