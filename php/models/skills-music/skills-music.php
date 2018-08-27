<?php

class MusicSkills
{
	function __construct()
	{

		$this->allowed_skills = array(
			array(
				'title'=> 'Sound',
				'skillid'=>1
			),
			array(
				'title'=> 'Piano',
				'skillid'=>2
			),
			array(
				'title'=> 'Voice',
				'skillid'=>3
			),
			array(
				'title'=> 'Voice - lead',
				'skillid'=>4
			),
			array(
				'title'=> 'Guitar',
				'skillid'=>5
			),
			array(
				'title'=> 'Guitar - lead',
				'skillid'=>6
			),
			array(
				'title'=> 'Bass guitar',
				'skillid'=>7
			),
			array(
				'title'=> 'Drums',
				'skillid'=>8
			)
		);

		$meta = array(
			'groupname'=>'My music skills',
			'groupid'=>'musicskills',
			'data' => $this->allowed_skills
		);

		$this->skills_ms = new MaterialSwitches($meta);

	}

	function get_allowed_skills()
	{
		return $this->allowed_skills;
	}

	function view_allowed_skills()
	{
		return $this->skills_ms->render();
	}
}


?>