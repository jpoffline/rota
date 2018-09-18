<?php

class RotaMembersAllView
{
	private $rotaname;
	private $periodid;
	private $groupname;
	private $periodinfo;
	function __construct(
		$rotaname,
		$periodid
	)
	{
		$this->rotaname = $rotaname;
		$this->periodid = $periodid;
		$this->periodinfo = get_periodname_for_type(
			$this->rotaname,
			$this->periodid
		);
		$this->groupname = get_groupname_for_rota($this->rotaname);
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
		$dd = new CompileRotaOptions($this->rotaname);
		
		$data = $dd->get_compiled_rota($this->periodid);

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