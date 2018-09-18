<?php

include_once('src/php/includes.php');

?>

<?php
include_once('src/php/html_head.php');
?>
    <div class='container'>

    <?php
      $cls1 = new AllRotasView();
      echo $cls1->render();

      $cls1 = new AllPeriodsView();
      echo $cls1->render('music');
    ?>


    </div>


<?php
include_once('src/php/html_foot.php');
?>