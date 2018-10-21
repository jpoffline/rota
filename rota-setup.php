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
					<div class="panel-heading">Periods</div>
					
					<?php
						echo sqltbl_to_html($RotaDBInterface->get_periods());
					?>
					
				</div>
			</div>
			
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Rota types
						<span style = 'float:right;'>
							<?php
							echo button(
								$id      = 'modal_AddRota-show', 
								$text    = 'Add rota', 
								$class   = 'danger', 
								$onclick = 'showModal(this.id)',
								$icon    = iconDespatch('add')
							);
							?>
						</span>
					</div>
					
					<?php
						echo sqltbl_to_html($RotaDBInterface->get_all_rotas());
					?>

					
					
					<?php
					echo modal(
						$id     = 'modal_AddRota',
						$header = 'Add rota',
						$body   = "	<label for='newRotaName'>Rota name</label>
						<input id='newRotaName' type = 'text' /> <br/>
						<label for='newRotaGroupName'>Rota group name</label>
						<input id='newRotaGroupName' type = 'text' />
						<br />
						<button class='btn btn-primary update' id='addRotaName' onClick='addRotaName(this.id);'>Add rota</button>
						",
						$footer = ''
					);
					?>

				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Availability types</div>
					
					<?php
						echo sqltbl_to_html($RotaDBInterface->get_all_availabilitytypes());
					?>
					
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Members</div>
					
					<?php
						echo sqltbl_to_html($RotaDBInterface->get_all_members());
					?>
					
				</div>
			</div>
		
		</div>


    </div>


<?php
include_once('src/php/html_foot.php');
?>