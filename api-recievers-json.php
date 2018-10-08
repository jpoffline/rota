<?php
include_once('src/php/includes.php');
header("Content-Type: application/json");
$v = json_decode($_REQUEST["data"]);

$route = $v->{"route"};

if($route == "newRota")
{
	$db = new RotaDBInterface();
	$db->add_rota(
		$v->{"data"}->{"newName"},
		$v->{"data"}->{"newGroupName"}
	);
}
else if($route == "showCompiledRota")
{
	$cls = new RotaMembersAllView(
		$v->{"data"}->{"rotaid"}, 
		$v->{"data"}->{"periodid"});
    echo $cls->render();
} 
else if($route == "getPeriodsForRotaid")
{
	$r1 = new RotaDBInterface();
	echo $r1->get_periods_for_rota_as_dropdown(
		$v->{"data"}->{"rotaid"},
		$v->{"data"}->{"dropdown_id"}
	);
}

?>