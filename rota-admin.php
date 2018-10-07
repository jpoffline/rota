<?php

include_once('src/php/includes.php');

?>

<?php
include_once('src/php/html_head.php');
?>
      

    <div class='container'>
    <?php
        $r1 = new RotaDBInterface();
        echo 'Rotas ' . dropdown(
          $r1->get_all_rotas(), 
          'rotaid','rotaname',
          'selection_rotas'
        );
        echo dropdown(
          $r1->get_periods_for_rota(1),
          'periodid',
          'periodname',
          'selection_periods'
        );
      ?>
        <button class = "btn btn-primary" id = "showRotaCompiled" onClick="showRotaCompiled()">Show</button>
    <?php
      $cls = new RotaMembersAllView(1, 1);
      echo $cls->render();
    ?>

    </div>


<?php
  include_once('src/php/html_foot.php');
?>