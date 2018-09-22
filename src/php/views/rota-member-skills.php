<?php

class RotaMemberSkillsView
{
	private $skills;

	private $colnames = array('Skill', 'Have it?');

	function __construct(&$member, $type)
	{
		
		$member_skills         = $member->get_skills($type);
		$askills_list          = $member->get_all_skills($type);
		$this->member_username = $member->get_username();
		$this->member_userid   = $member->get_userid();
		$this->rotaid = $type;

		foreach($askills_list as $d)
		{
			$skill_id = $d['skillid'];
			$skill_name = $d['title'];
			
			$this->avail[]  = array(
				$skill_name,
				Comp_MaterialSwitch_switch(
					array(
						'id'      => $this->_gen_skillsrow_id($skill_id),
						'checked' => in_array($skill_id, $member_skills)
					)
				)
			);
		}

	}

	private function _gen_skillsrow_id($skillid)
	{
		return implode(
			'-',
			array(
				'skills',
				$this->member_userid,
				$this->rotaid,
				$skillid
			)
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