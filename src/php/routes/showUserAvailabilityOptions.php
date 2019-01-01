<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: showUserAvailabilityOptions.php
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function route_showUserAvailabilityOptions($log, $data)
{
	$log('viewing user availablity options');

	$uid = $data->{"userid"};
	$pid = $data->{"periodid"};
	$rid = $data->{"rotaid"};
	$log('userid:   '. $uid);
	$log('periodid: '. $pid);
	$log('rotaid:   '. $rid);
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
	$log('periodname: '.$rm->get_period_name($pid));
	return json_encode($ar);
}

?>