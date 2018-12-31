<?php


class RotaMember extends Rota
{

	function __construct($userid, $periodid, $rotaid)
	{
		parent::__construct();
		$this->periodid  = $periodid;
		$this->set_periodidx((int)$periodid);
		$this->userid    = $userid;
		$this->rota_type = get_rotaname_for_rota($rotaid);
		$this->rotaid    = $rotaid;
		
		
		$this->load_memberdata();
	}

	private function load_memberdata()
	{
		
		$this->mbd          = new RotaMemberData($this->userid);
		$this->userid       = $this->mbd->userid();
		$this->username     = $this->mbd->username();
		$this->usernamefull = $this->mbd->usernamefull();
		$this->skills       = $this->mbd->skills($this->rotaid);
		$this->availability = $this->mbd->get_datestate($this->rotaid, $this->periodid, 1);
		$this->confirmed    = $this->mbd->get_datestate($this->rotaid, $this->periodid, 2);
	}

	function num_days_available()
	{
		return count($this->availability);
	}

	function get_skills($type)
	{
		return $this->skills;
	}

	function get_availability()
	{
		return $this->get_datedate(1);
	}

	function get_confirmeddates()
	{
		return $this->get_datedate(2);
	}

	function get_datedate($availtypeid)
	{
		return $this->mbd->get_datestate(
			$this->rotaid, 
			$this->periodid, 
			$availtypeid
		);
	}

	function get_username()
	{
		return $this->username;
	}
	function get_userid()
	{
		return $this->userid;
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
			$this,
			$this->rotaid
		);
		return $view_avail->render();
	}

	function render_skills()
	{
		$view_skills = new RotaMemberSkillsView(
			$this, 
			$this->rotaid
		);
		return $view_skills->render();
	}

}

?>