<?php

function dropdown($data, $key, $value)
{
	$dd= "<select>";
		
	foreach($data as $r){
		$dd.= '<option value = "'.$r[$key].'">'.$r[$value].'</option>';
	}
	return $dd."</select>";
}

?>