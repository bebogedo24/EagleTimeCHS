<?php

include 'util.php';
include 'sql.php';

if(!isset($_GET['access']))
	exit;
	
if($_GET['access'] != ACCESS_HASH)
	exit;

$val = 0;
if(isset($_GET['open']))
	$val = 1;

setParam("enabled", $val);
echo "Success.";

?>