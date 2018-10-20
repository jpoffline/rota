<?php

function button($id, $text, $class = 'primary', $onclick='')
{
	$btn = '<button id="'.$id.'" class="btn btn-'.$class.'"';
	if($onclick != '')
	{
		$btn .= ' onClick="'.$onclick.'"';
	}
	return $btn.'>'.$text.'</button>';
}


?>