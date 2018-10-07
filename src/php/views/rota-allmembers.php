<?php

class RotaMembersAllView
{
	private $rotaname;
	private $periodid;
	private $groupname;
	private $periodinfo;
	function __construct(
		$rotaname,
		$rotaid,
		$periodid
	)
	{
		$this->rotaname = $rotaname;
		$this->periodid = $periodid;
		$this->rotaid   = $rotaid;
		$this->periodinfo = get_periodname_for_type(
			$this->rotaid,
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
		
		$dd = new CompileRotaOptions($this->rotaname, $this->rotaid);
		
		$data = $dd->get_compiled_rota($this->periodid);

		$cls = new Table(
			array(
			  'colnames' => $dd->get_colnames(),
			  'rows' => $data,
			  'id' => 'compiled-'.$this->rotaname.'-'.$this->periodid
			)
		);
		return '<h1>'.$this->groupname.' setup // '.$this->periodinfo.'</h1>'.
				'<h2>View: availability of skill sets <button class="btn btn-primary" 
				onClick="onSubmitSaveRotaOptions(this.id)" id="'.$this->rotaname.'-'.$this->periodid.'">save</button></h2>'
					.$cls->render();
	}

}


?>