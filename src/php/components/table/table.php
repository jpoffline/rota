<?php


class Table
{
	private $rows;
	private $colnames;
	function __construct($data)
	{
		$this->colnames = $data['colnames'];
		$this->rows = $data['rows'];
		$this->tableid = $data['id'];
	}

	function render()
	{
		return '<table class="table" id="'.$this->tableid.'">'.$this->_generate_header().
		$this->_generate_rows(). '</table>';
	}

	function _generate_header()
	{
		$html = '<thead><tr>';
		foreach($this->colnames as $colname)
		{
			$html .= '<th scope="col">'.$colname.'</th>';
		}
		return $html.'</tr></thead>';
	}

	function _generate_rows()
	{
		$html = '<tbody>';
		foreach($this->rows as $row)
		{
			$html .= $this->_generate_row($row);
		}
		return $html .'</tbody>';
	}

	function _generate_row($d)
	{
		$html = '<tr>';
		foreach($d as $cell)
		{
			$html .= '<td>'.$cell. '</td>';
		}
		return $html .'</tr>';
	}

}

function sqltbl_to_html($data){
	$tb = '';
	$tb.= '<table class="table">';

	$first = true;
	foreach($data as $rr){

		if($first)
		{
			$keys = array_keys($rr);
			$head = '<thead><tr>';
			foreach($keys as $key){
				$head.='<th>'.$key.'</th>';
			}
			$first = false;
			$tb.=$head.'</tr></thead><tbody>';
		}
		
		$tb.= '<tr>';
		$row = '';
		foreach($rr as $rrr){
			$row .= '<td>'.$rrr.'</td>';
		}
		$tb.= $row.'</tr>';
	}
	$tb.= '</tbody>';
	$tb.= '</table>';
	return $tb;
}

?>