<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: logger.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function writeToLog($msg)
{
	$date = date('d/m/Y H:i:s', time());
	$my_file = 'logs/apilog.txt';
	$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);
	$msg ='['.get_version().' '.$date.'] '.$msg.PHP_EOL;
	fwrite($handle, $msg);
	fclose($handle);
}

?>