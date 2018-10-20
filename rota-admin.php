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
          'rotaid',
          'rotaname',
          'selection_rotas',
          'onChange_rotaid'
        );
        
      ?>
        <div id = 'dd_periods_for_rota' ></div>
        <button class = "btn btn-primary" id = "showRotaCompiled" onClick="showRotaCompiled()">Show</button>
        <div id = 'area_compiledRotaView'></div>

    </div>


<?php
  include_once('src/php/html_foot.php');
?>