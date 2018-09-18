<?php
/*
<table class="table">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				</tr>
				<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				</tr>
				<tr>
				<th scope="row">3</th>
				<td>Larry</td>
				<td>the Bird</td>
				<td>@twitter</td>
				</tr>
			</tbody>
			</table>*/

class Table
{
	private $rows;
	private $colnames;
	function __construct($data)
	{
		$this->colnames = $data['colnames'];
		$this->rows = $data['rows'];
	}

	function render()
	{
		return '<table class="table">'.$this->_generate_header().
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