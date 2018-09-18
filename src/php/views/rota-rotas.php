<?php

class AllRotasView{

	function render(){
		$cls1 = new RotaDBInterface();		
		$rotas = $cls1->get_all_rotas();
		return dropdown($rotas, 'rotaid', 'rotaname');
	}

}

class AllPeriodsView{

	function render($rotaname){
		$cls1 = new RotaDBInterface();
		$rotas = $cls1->get_periods_for_rota($rotaname);
		return dropdown($rotas, 'periodid', 'periodname');
	}
	
}

?>