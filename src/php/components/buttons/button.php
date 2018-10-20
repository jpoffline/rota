<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: button.php
CREATED:  2018/10/20
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function button(
	$id, 
	$text, 
	$class   = 'primary', 
	$onclick = '', 
	$icon    = ''
){
	$btn = '<button id="'.$id.'" class="btn btn-'.$class.'"';
	if($onclick != '')
	{
		$btn .= ' onClick="'.$onclick.'"';
	}

	if($icon != '')
	{
		$text = to_icon($icon) . ' '. $text;
	}
	

	return $btn.'>'.$text.'</button>';
}


?>