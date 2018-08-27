<?php

class Rota
{
	private $all_dates = array(
		'music' => array(
			"01/03/2018", 
			"07/03/2018", 
			"14/03/2018",
			"21/03/2018"
		)
	);

	private $all_skills = array(
		'music' => array(
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
				'skillid'=>3,
				'icon'=>'volume-up'
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
		)
		);

	function __construct()
	{

	}

	function get_all_dates($type)
	{
		return $this->all_dates[$type];
	}

	function get_all_skills($type)
	{
		return $this->all_skills[$type];
	}

	

}

?>