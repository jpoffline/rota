<?php


/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: api-recievers-json.php
CREATED:  2018/10/20
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


include_once('src/php/lib/log/logger.php');
include_once('src/php/includes.php');
header("Content-Type: application/json");
$data = json_decode($_REQUEST["data"]);

$route = $data->{"route"};
writeToLog('route from js: '.$route);
if($route == "newRota")
{
	$db = new RotaDBInterface();
	$db->add_rota(
		$data->{"data"}->{"newName"},
		$data->{"data"}->{"newGroupName"}
	);
}
else if($route == "showCompiledRota")
{
	$cls = new RotaMembersAllView(
		$data->{"data"}->{"rotaid"}, 
		$data->{"data"}->{"periodid"});
    echo $cls->render();
} 
else if($route == "getPeriodsForRotaid")
{
	$r1 = new RotaDBInterface();
	echo $r1->get_periods_for_rota_as_dropdown(
		$data->{"data"}->{"rotaid"},
		$data->{"data"}->{"dropdown_id"}
	);
}
else if($route == "updateRotaAvail")
{
	$newDate  = $data->{"data"}->{"updateDate"};
	$newState = $data->{"data"}->{"newState"};
	writeToLog('updating user availability: '.$newDate);
	writeToLog('new state: '.$newState);

	$r1 = new RotaDBInterface();
	$r1->set_user_availabilty(
		$newDate,
		$newState
	);
	
}



?>