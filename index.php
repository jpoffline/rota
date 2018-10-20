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
      //
			Rota: <?php echo $CLS_rota_member->get_rota_type()?>
		</h1>
    <?php
      echo button('myModal-show', 'View and edit my skills', 'danger');
    ?>
    
    <?php
      echo modal(
        $id     = 'myModal',
        $header = 'My '.$CLS_rota_member->get_rota_type().' skills',
        $body   = $CLS_rota_member->render_skills(),
        $footer = button('updateSkills', 'Update', 'success update')
      );
    ?>

    

		<div class="row">
        
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">My availability // 
          <?php 
            echo $CLS_rota_member->get_period_name(1). ' // '. 
                 $CLS_rota_member->num_days_available().' days' 
          ?></div>
          <button class="btn btn-primary update" id='updateAvailability' onClick='onSubmitListen(this.id, this.id);'>Update</button>
            <?php
            
              echo $CLS_rota_member->render_availability();

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