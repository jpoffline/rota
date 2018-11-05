<?php

include_once('src/php/includes.php');
$RotaDBInterface = new RotaDBInterface();
?>

<?php
include_once('src/php/html_head.php');
?>
    <div class='container'>

		<div class="row">
			

			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Rota types
						<span style = 'float:right;'>
							<?php
							echo button(
								$id      = 'modal_AddRota-show', 
								$text    = '', 
								$class   = 'danger', 
								$onclick = 'showModal(this.id)',
								$icon    = iconDespatch('add')
							);
							?>
						</span>
					</div>
					
					<?php
						echo sqltbl_to_html(
							$RotaDBInterface->get_all_rotas(),
							$columnformat = array(
								"rotaname" => "str"
							)
						);
					?>

					
					
					<?php
					echo modal(
						$id     = 'modal_AddRota',
						$header = 'Add rota',
						$body   = "
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
						)
						,
						$footer = ''
					);
					?>

				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
					Periods
					<span style = 'float:right;'>
							<?php
							echo button(
								$id      = 'modal_AddPeriod-show', 
								$text    = '', 
								$class   = 'danger', 
								$onclick = 'showModal(this.id)',
								$icon    = iconDespatch('add')
							);
							?>
						</span>
					</div>
					
					<?php
						echo sqltbl_to_html(
							$RotaDBInterface->get_periods(),
							$columnformat = array(
								"rotaname" => "str",
								"periodname"=>"str"
							)
						);
					?>

					<?php
					
					echo modal(
						$id     = 'modal_AddPeriod',
						$header = 'Add period',
						$body   = "
						<h4>Add a new period to an existing rota</h4>
						<table>
						<tr>
							<td><label for='newRotaGroupName'>Rota</label></td>
							<td>
								". dropdown(
									$RotaDBInterface->get_all_rotas(), 
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
						)
						,
						$footer = ''
					);
					?>
					
				</div>
			</div>
			

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Availability types</div>
					
					<?php
						echo sqltbl_to_html(
							$RotaDBInterface->get_all_availabilitytypes()
						);
					?>
					
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Members</div>
					
					<?php
						echo sqltbl_to_html(
							$RotaDBInterface->get_all_members(),
							$columnformat = array(
								"rotaname" => "str",
								"name" =>"str"
							)
						);
					?>
					
				</div>
			</div>
		
		</div>


    </div>


<?php
include_once('src/php/html_foot.php');
?>