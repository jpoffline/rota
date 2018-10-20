<?php

include_once('src/php/includes.php');

?>

<?php
include_once('src/php/html_head.php');
?>
      

    <div class='container'>
    <?php
        $r1 = new RotaDBInterface();
        echo dropdown(
          $r1->get_all_rotas(), 
          'rotaid',
          'rotaname',
          'selection_rotas',
          'onChange_rotaid'
        );
        
      ?>
        <div id = 'dd_periods_for_rota' ></div>
        
        <?php
          echo button(
            $id      = 'showRotaCompiled', 
            $text    = 'Show', 
            $class   = 'primary', 
            $onclick = 'showRotaCompiled()'
          );
        ?>

        <div id = 'area_compiledRotaView'></div>

    </div>


<?php
  include_once('src/php/html_foot.php');
?>