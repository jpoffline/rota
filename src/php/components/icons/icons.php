<?php

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
}

?>