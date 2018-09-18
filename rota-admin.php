<?php

include_once('src/php/includes.php');
include_once('src/php/models/db/rota-db-general.php');
RotaSQL_setupbd();
RotaSQL_setuptbls();
RotaSQL_setDummyInfo();
?>

<?php
include_once('src/php/html_head.php');
?>
    <div class='container'>

    <?php
      $cls = new RotaMembersAllView();
      echo $cls->render();
    ?>

    </div>


<?php
include_once('src/php/html_foot.php');
?>