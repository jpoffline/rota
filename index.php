<?php
include_once('src/php/includes.php');
$RotaDBInterface = new RotaDBInterface();
?>


<?php
include_once('src/php/html_head.php');

?>

	<div class='container'>

    <?php

      echo dropdown(
        $RotaDBInterface->get_all_rotas(), 
        'rotaid',
        'rotaname',
        'selection_rotas',
        'onChange_rotaid'
      );
    ?>
    <span id = 'dd_periods_for_rota' ></span>

    <?php
          echo button(
            $id      = 'btn_showUserAvailability',
            $text    = 'Show',
            $class   = 'danger',
            $onclick = 'showUserAvailabilityOptions()',
            $icon    = iconDespatch('view')
          );

    ?>

		<h1>
			Member: <span id = 'ui_username'></span>
    </h1>
    <h2>
			Rota: <span id = 'ui_rotatype'></span>
		</h2>

    <span id = 'ui_btnuserskills'></span>
    <span id = 'ui_mdluserskills'></span>

		<div class="row">
        
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading">
            My availability // 
            <span id = 'ui_periodname'></span> //
            <span id = 'ui_numavailabledays'></span> days
          </div>
          <span id = 'ui_useravailabilityopts'></span>
        </div>
      </div>

      </div>

	  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include_once('src/php/html_foot.php');
?>