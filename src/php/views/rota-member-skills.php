<?php

class RotaMemberSkillsView
{
	private $skills;

	function __construct(&$member, $type)
	{
		$member_skills = $member->get_skills($type);
		$askills_list = $member->get_all_skills($type);
		$this->member_username = $member->get_username();

		
		foreach($askills_list as $d)
		{
			$this->skills[] = array(
				'title'      => $d['title'], 
				'checked' => in_array($d['skillid'], $member_skills)
			);
		}

	}

	function render()
	{
		$meta = array(
			'groupid'=>$this->member_username.'-music-skills-',
			'data' => $this->skills
		);

		$skills_ms = new MaterialSwitches($meta);
		return $skills_ms->render();
	}
	
}

?>