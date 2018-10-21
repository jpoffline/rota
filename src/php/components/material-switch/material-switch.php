<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: material-switch.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


# see https://bootsnipp.com/snippets/featured/material-design-switch

function Comp_MaterialSwitch_guts($props, $route = "rota")
{
	$id = $props['id'];
	$type = $props['type'];
	
	if($type == '')
	{
		$type = 'primary';
	}

	$checked = $props['checked'];
	if($checked == '')
	{
		$checked = '';
	}
	else
	{
		$checked = 'checked';
	}
	
	return '<input id="'.$id.'" type="checkbox" '.$checked.' onChange="onChangeListen(\''.$route.'\', this.id);"/>
		<label for="'.$id.'" class="label-'.$type.'"></label>';
}

function Comp_MaterialSwitch_switch($props, $route = "rota")
{
	return '
	<div>
		'.Comp_MaterialSwitch_guts($props, $route).'
	</div>';
}

function Comp_MaterialSwitch($props)
{
	$title = $props['title'];
	$icon = $props['icon'];
	if($icon != '')
	{
		$icon = '<span class="glyphicon glyphicon-'.$icon.'" aria-hidden="true"></span>';
	}
	return '
		<li class="list-group-item">'.$icon.'
			'.$title.'
			<div >
			'.Comp_MaterialSwitch_guts($props).'
			</div>
		</li>';
}

class MaterialSwitches
{
	private $data;
	function __construct($data) {
        $this->data = $data;
	}
	
	function render()
	{

		$colnames = array('Skill', 'Have it?');
		$rows = array();
		$id_base = $this->data['groupid'];
		foreach($this->data['data'] as $item)
		{
			$item['id'] = $id_base.$count;
			$v = Comp_MaterialSwitch_switch($item);
			$k = $item['title'];
			$row = array($k, $v);
			$rows[] = $row;
			$count ++;
		}
		$cls = new Table(
			array(
				'colnames'=>$colnames,
				'rows' =>$rows
			)
		);
		return $cls->render();
	}

}

?>