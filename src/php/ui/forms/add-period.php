<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: add-period.php
CREATED:  2018/12/24
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function ui_add_new_period($items)
{
	return "
	<h4>Add a new period to an existing rota</h4>
	<table>
	<tr>
		<td><label for='newRotaGroupName'>Rota</label></td>
		<td>
			". dropdown(
				$items, 
				'rotaid',
				'rotaname',
				'addperiod_rotaid'
			  )."
		</td>
	</tr>
	<tr>
		<td><label for='newPeriodName'>New period name</label></td>
		<td><input id='newPeriodName' type = 'text' /> </td>
	</tr>
	</table>
	<br />
	".button(
		$id      = 'addNewPeriod',
		$text    = 'Add period',
		$class   = 'primary update',
		$onclick = 'addPeriodToRota(this.id)'
	);
}

?>