<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: id-compiled.php
CREATED:  2019/01/01
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

class IDCompiledResource
{
	private $delim = '-';
	
	function __construct()
	{

	}

	function generate(
		$dateid, 
		$resource_userid, 
		$skillid, 
		$availtype
	){
		return implode(
			$this->delim,
			array(
				$dateid, 
				$resource_userid, 
				$skillid, 
				$availtype
			)
		);
	}

	function decode($str)
	{
		$opts = explode($this->delim, $str);
		return array(
			"dateid"          => $opts[0],
			"resource_userid" => $opts[1],
			"skillid"         => $opts[2],
			"availtype"       => $opts[3],
		);
	}
}

?>