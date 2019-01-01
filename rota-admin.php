<?php
include_once('src/php/includes.php');
$RotaDBInterface = new RotaDBInterface();

include_once('src/php/html_head.php');
?>
      

    <div class='container'>
      <?php
        echo dropdown(
          $RotaDBInterface->get_all_rotas(), 
          'rotaid',
          'rotaname',
          'selection_rotas',
          'onChange_rotaid'
        );
        
      ?>
      <span id = 'dd_periods_for_rota' ></span>
      
      <?php
        echo button(
          $id      = 'showRotaCompiled', 
          $text    = 'Show', 
          $class   = 'primary', 
          $onclick = 'showRotaCompiled()',
          $icon = iconDespatch('view')
        );
      ?>

      <div id = 'area_compiledRotaView'></div>

    </div>


<?php
  include_once('src/php/html_foot.php');
?>