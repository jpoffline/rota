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
					<div class="panel-heading">Rota types</div>
					
					<?php
						echo sqltbl_to_html($RotaDBInterface->get_all_rotas());
					?>
					
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Availablity types</div>
					
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