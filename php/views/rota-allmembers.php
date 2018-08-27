<?php

class RotaMembersAllView
{

	private $data = array(
		array("01/02/18", "jp", "mb, ab", "mb", "ab"),
		array("07/02/18", "jp", "mb", "mb", "ab"),
		array("14/02/18", "jp", "mb, ab", "mb", "ab")
	);
	private $skills = array(
		array('title'=>'Sound'), 
		array('title'=>'Voice'), 
		array('title'=>'Guitar'),
		array('title'=>'Piano')
	);

	function __construct()
	{
		$groupname = 'Band';
		
		$this->groupname = $groupname;
		$this->periodinfo = $period;
		$this->gen_colnames($this->skills);
	}

	function gen_colnames($skills)
	{
		$ss = array('Date');
		foreach($skills as $s)
		{
			$ss[] = $s['title'];
		}
		$this->colnames = $ss;
	}

	function render()
	{
		
		$cls = new Table(
			array(
			  'colnames' => $this->colnames,
			  'rows' => $this->data
			)
		);
		return '<h1>'.$this->groupname.' setup</h1>'.$cls->render();
	}

}


?>