<?php

include 'sql.php';
include 'util.php';

if(!isset($_GET['pass']) or !isset($_GET['hash']))
	exit;
	
if($_GET['hash'] != "d5b286be928fed6ae2211bb899414faf")
	exit;
	
$passId = $conn->real_escape_string($_GET['pass']);

$conn->query("DELETE FROM `signups` WHERE `id`=$passId");

redirSuccess("./passes.php", "That pass has been deleted.");

include 'footer.php' ?>