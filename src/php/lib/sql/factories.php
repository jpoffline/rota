<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * *

FILENAME: factories.php
CREATED:  2018/10/21
AUTHOR:   JPEARSON

* * * * * * * * * * * * * * * * * * * * * * * * * * */

function sqlfactory_insert($tableName, $names, $values)
{
	return "INSERT INTO ".$tableName." (".$names.") VALUES (".$values.")";
}

function sqlfactory_delete($tableName, $keys)
{
	return "DELETE FROM ".$tableName." WHERE ".$keys. ";";
}

?>