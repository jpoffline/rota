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
						$body   = ui_add_new_rota(
						),
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
						$body   = ui_add_new_period(
							$RotaDBInterface->get_all_rotas()
						),
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