<?php


# see https://bootsnipp.com/snippets/featured/material-design-switch

function Comp_MaterialSwitch_guts($props)
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
	
	return '
		<input id="'.$id.'" name="someSwitchOption001" type="checkbox" '.$checked.' onChange="onChangeListen(\'rota\', this.id);"/>
		<label for="'.$id.'" class="label-'.$type.'"></label>';
}

function Comp_MaterialSwitch_switch($props)
{
	return '
	<div >
		'.Comp_MaterialSwitch_guts($props).'
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
		/*$html = '<ul class="list-group">';
		$count = 0;
		$id_base = $this->data['groupid'];
		foreach($this->data['data'] as $item)
		{
			$item['id'] = $id_base.$count;
			$html .= Comp_MaterialSwitch(
				$item
			);
			$count ++;
		}
		return $html.'</ul>';*/

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