<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: str_to_rgb.php
CREATED:  2018/11/17
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function str_to_rgb($id, $opacity = 0.5){
	$hex = '#'.substr(md5($id), 0, 6);
	
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	return 'rgb('.$r. ','.$g.','.$b.', '.$opacity.')';
}

?>