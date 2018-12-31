<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: api-recievers-json.php
CREATED:  2018/10/20
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


include_once('src/php/lib/log/logger.php');
include_once('src/php/includes.php');
header("Content-Type: application/json");

// Pull the data from the HTTP request header
$data = json_decode($_REQUEST["data"]);

// Pull out the route name
$route = $data->{"route"};

// Write the route to log
writeToLog('ROUTE '.$route);

// Decide what to do, based on the route.
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
		$data->{"data"}->{"periodid"}
	);
    echo $cls->render();
} 
else if($route == "showUserAvailabilityOptions")
{
	writeToLog('viewing user availablity options');

	$uid = $data->{"data"}->{"userid"};
	$pid = $data->{"data"}->{"periodid"};
	$rid = $data->{"data"}->{"rotaid"};
	writeToLog('userid:   '. $uid);
	writeToLog('periodid: '. $pid);
	writeToLog('rotaid:   '. $rid);
	$rm = new RotaMember(
		$uid, 
		$pid, 
		$rid
	);
	$btn = button(
        $id      = 'modal_MySkills-show', 
        $text    = 'View and edit my skills', 
        $class   = 'danger', 
        $onclick = 'showModal(this.id)',
        $icon    = iconDespatch('skills')
      );
    
      $mdl = modal(
        $id     = 'modal_MySkills',
        $header = 'My '.$rm->get_rota_type().' skills',
        $body   = $rm->render_skills(),
        $footer = ''
      );
    
	$ar = array(
		'username'             => $rm->get_usernamefull(),
		'rotatype'             => $rm->get_rota_type(),
		'periodname'           => $rm->get_period_name($pid),
		'numavailabledays'     => $rm->num_days_available(),
		'useravailabilityopts' => $rm->render_availability(),
		'btnuserskills'        => $btn,
		'mdluserskills'        => $mdl

	);
	writeToLog('periodname: '.$rm->get_period_name($pid));
	echo json_encode($ar);
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
else if($route == "updateMemberSkill")
{
	$updateSkill = $data->{"data"}->{"updateSkill"};
	$newState = $data->{"data"}->{"newState"};
	writeToLog('updating user skill: '. $updateSkill);
	writeToLog('new state: '.$newState);

	$r1 = new RotaDBInterface();
	$r1->set_user_skills(
		$updateSkill,
		$newState
	);
}
else if($route == "newPeriodForRota")
{
	$newPeriodName = $data->{"data"}->{"newPeriodName"};
	$rotaId = $data->{"data"}->{"rotaId"};
	writeToLog('adding period for rota');
	writeToLog('new period name: '.$newPeriodName);
	writeToLog('rotaID: '.$rotaId);
	$r1 = new RotaDBInterface();
	$r1->add_period_for_rotaid(
		$rotaId,
		$newPeriodName
	);
}
else
{
	writeToLog('unknown route requested');
}


?>