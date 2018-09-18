<?php

class SQLHelp
{
	function SQL_deltbl($conn, $tbl){
		$sql = "IF OBJECT_ID('dbo.".$tbl."', 'U') IS NOT NULL DROP TABLE ".$tbl .";";
		$sql = "DROP TABLE IF EXISTS ".$tbl;
		if ($conn->query($sql) === TRUE) {
	
		}
		else {
	
		}
	}
}

?>