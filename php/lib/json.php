<?php

function read_json_file($fn)
{
	$string = file_get_contents($fn);
	return json_decode($string, true);
}

?>
