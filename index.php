<?php
include_once('php/lib/json.php');
include_once('php/components/material-switch/material-switch.php');
include_once('php/components/table/table.php');
include_once('php/models/skills-music/skills-music.php');
include_once('php/models/rota/rota.php');
include_once('php/models/rota/compile-rota-options.php');
include_once('php/models/rota-member/rota-member.php');
include_once('php/models/rota-member/rota-member-data.php');
include_once('php/views/rota-member-availability.php');
include_once('php/views/rota-member-skills.php');
include_once('php/views/rota-allmembers.php');

$CLS_rota_member = new RotaMember(1, '1', 'music');

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/components/material-switch.css">
    <title>SHBC::rota</title>
  </head>
  <body>

	<div class='container'>


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
            <?php
            
              echo $CLS_rota_member->render_availability();

            ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">My music skills</div>
            <?php

              echo $CLS_rota_member->render_skills();

            ?>
          </div>
        </div>
      </div>

	  </div>


    <hr />
    <div class='container'>

    <?php
      $cls = new RotaMembersAllView();
      echo $cls->render();

      $cls2 = new CompileRotaOptions();
    ?>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src = "js/listeners/onChange.js"></script>
  </body>
</html>