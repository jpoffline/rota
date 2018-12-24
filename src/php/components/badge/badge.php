<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: badge.php
CREATED:  2018/11/17
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function badge($text, $rgb, $cls = '')
{
	return '<span class="'.$cls.'" style="background-color:'.$rgb.';">
	'.$text.'
	</span>';
	
}

?>