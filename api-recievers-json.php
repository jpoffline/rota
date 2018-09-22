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


?>