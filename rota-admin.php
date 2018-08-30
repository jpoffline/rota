<?php

include_once('src/php/includes.php');

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