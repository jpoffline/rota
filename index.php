<?php
include_once('src/php/includes.php');
?>


<?php
include_once('src/php/html_head.php');
?>
	<div class='container'>

    <?php
    $userid = 1;
    $periodid = '1';
      $CLS_rota_member = new RotaMember($userid, $periodid, 'music');
    ?>

		<h1>
			Member: <?php echo $CLS_rota_member->get_usernamefull()?>
		</h1>
    <h1>
			Rota: <?php echo $CLS_rota_member->get_rota_type()?>
		</h1>

		<div class="row">
        
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">My availability // <?php echo $CLS_rota_member->get_period_name('music'). ' // '. $CLS_rota_member->num_days_available().' days' ?></div>
          <button class="btn btn-primary update">Update</button>
            <?php
            
              echo $CLS_rota_member->render_availability();

            ?>
            
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">My music skills</div>
            <button class="btn btn-success update">Update</button>
            <?php

              echo $CLS_rota_member->render_skills();

            ?>
          </div>
          
        </div>
      </div>

	  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include_once('src/php/html_foot.php');
?>