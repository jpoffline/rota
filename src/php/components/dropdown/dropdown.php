<?php

function dropdown($data, $key, $value, $id, $onChange='dropDownChange')
{
	$dd= "<select id = '".$id."' onChange='".$onChange."(this.id);'>";
		
	foreach($data as $r){
		$dd.= '<option value = "'.$r[$key].'">'.$r[$value].'</option>';
	}
	return $dd."</select>";
}

?>