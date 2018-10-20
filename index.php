<?php
include_once('src/php/includes.php');
?>


<?php
include_once('src/php/html_head.php');
?>

	<div class='container'>

    <?php
      $userid = 1;
      $periodid = 1;
      $CLS_rota_member = new RotaMember($userid, $periodid, 'music');
    ?>

		<h1>
			Member: <?php echo $CLS_rota_member->get_usernamefull()?>
      //
			Rota: <?php echo $CLS_rota_member->get_rota_type()?>
		</h1>
    <?php
      echo button(
        $id      = 'myModal-show', 
        $text    = 'View and edit my skills', 
        $class   = 'danger', 
        $onclick = '',
        $icon    = iconDespatch('skills')
      );
    ?>
    
    <?php
      echo modal(
        $id     = 'myModal',
        $header = 'My '.$CLS_rota_member->get_rota_type().' skills',
        $body   = $CLS_rota_member->render_skills(),
        $footer = ''
      );
    ?>

    

		<div class="row">
        
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">My availability // 
            <?php 
              echo $CLS_rota_member->get_period_name($periodid). ' // '. 
                   $CLS_rota_member->num_days_available().' days' 
            ?>
          </div>
         
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