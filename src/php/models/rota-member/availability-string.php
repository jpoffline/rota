<?php

function generateAvailabilityString(
	$rotaid, $periodid, $userid,
	$dateid, $availid
){
	return implode(
		'-',
		array(
			$rotaid,
			$periodid,
			$userid,
			$dateid,
			$availid
		)
	);
}

function deparseAvailabilityString(
	$availstring, $format = 'array'
){
	$opts = explode("-", $availstring);
	if($format == 'csv')
	{
		return implode(", ", $opts);
	}
	else if($format == "sep-and")
	{
		$vals = deparseAvailabilityString(
			$availstring
		);
		return http_build_query($vals,'',' AND ');
	}
	return array(
		"rotaid"   => $opts[0],
		"periodid" => $opts[1],
		"userid"   => $opts[2],
		"dateid"   => $opts[3],
		"availtypeid"  => $opts[4]
	);
}

function namesAvailabilityString(
	$format = "csv"
){
	if($format == "csv")
	{
		return implode(
			", ",
			namesAvailabilityString($format = "array")
		);
	}
	else
	{
		return array(
			"rotaid",
			"periodid",
			"userid",
			"dateid",
			"availtypeid"
		);
	}
}

?>


