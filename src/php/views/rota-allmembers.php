<?php

class RotaMembersAllView
{

	function __construct()
	{
		$groupname = 'Band';
		$period = "Winter 2018";

		$this->groupname = $groupname;
		$this->periodinfo = $period;
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
		$dd = new CompileRotaOptions();
		$periodid = '1';
		$data = $dd->get_compiled_rota($periodid);

		$cls = new Table(
			array(
			  'colnames' => $dd->get_colnames(),
			  'rows' => $data
			)
		);
		return '<h1>'.$this->groupname.' setup // '.$this->periodinfo.'</h1><h2>View: availability of skill sets</h2>'
					.$cls->render();
	}

}


?>