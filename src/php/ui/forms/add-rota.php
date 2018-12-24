<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: add-rota.php
CREATED:  2018/12/24
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function ui_add_new_rota()
{
	return "
	<h4>Add a new rota to the system</h4>
	<table>
	<tr>
		<td><label for='newRotaName'>Rota name</label></td>
		<td><input id='newRotaName' type = 'text' /> </td>
	</tr>
	<tr>
		<td><label for='newRotaGroupName'>Group name</label></td>
		<td><input id='newRotaGroupName' type = 'text' /></td>
	</tr>
	</table>
	<br />
	".button(
		$id      = 'addRotaName',
		$text    = 'Add rota',
		$class   = 'primary update',
		$onclick = 'addRotaName(this.id)'
	);
}


?>