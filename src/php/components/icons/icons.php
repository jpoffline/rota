<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: icons.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function to_icon($iconName)
{
	return '<i class="fa fa-' . $iconName . '"></i>';
}

function iconDespatch($name)
{
	if($name == 'skills')
	{
		return 'cubes';
	}
	if($name == 'view')
	{
		return 'binoculars';
	}
	if($name == 'add')
	{
		return 'plus';
	}
}

?>