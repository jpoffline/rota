<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: skills-string.php
CREATED:  2018/10/20
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */


function generateSkillsString(
	$userid, $rotaid, $skillid
){
	return implode(
		'-',
		array(
			$userid, 
			$skillid
		)
	);
}

function deparseSkillsString(
	$skillsstring, $format = 'array'
){
	$opts = explode("-", $skillsstring);
	if($format == 'csv')
	{
		return implode(", ", $opts);
	}
	else if($format == "sep-and")
	{
		$vals = deparseSkillsString(
			$skillsstring
		);
		return http_build_query($vals,'',' AND ');
	}
	return array(
		"userid"   => $opts[0],
		"skillid"   => $opts[1]
	);
}

function namesSkillsString(
	$format = "csv"
){
	if($format == "csv")
	{
		return implode(
			", ",
			namesSkillsString($format = "array")
		);
	}
	else
	{
		return array(
			"userid",
			"skillid"
		);
	}
}

?>