<?php

	ob_start();

	date_default_timezone_set("EST");
	ini_set("output_buffering","1");
	
	$config = json_decode(file_get_contents("data/CONFIG.json"), true);

	// Connection info
	$servername = $config['SQL_Host'];
	$dusername = $config['SQL_User'];
	$dpassword = $config['SQL_Password'];
	$dbname = $config['Database'];

	$conn = new mysqli($servername, $dusername, $dpassword, $dbname);

	if ($conn->connect_error) {
		exit;
	}
	
	function getSignups($student) {
		global $conn;
		$res = array();
		$query = $conn->query("SELECT * FROM `signups` WHERE `studentId`=$student");
		if($query->num_rows > 0) {
			while($result = $query->fetch_assoc()) {
				array_push($res, $result);
			}
		}
		return $res;
	}
	
	function getStudents($teacher) {
		global $conn;
		$res = array();
		$query = $conn->query("SELECT * FROM `signups` WHERE `teacherId`=$teacher");
		if($query->num_rows > 0) {
			while($result = $query->fetch_assoc()) {
				array_push($res, $result);
			}
		}
		return $res;
	}
	
	function getUserData($id) {
		global $conn;
		$query = $conn->query("SELECT * FROM `users` WHERE `id`=$id");
		if($query->num_rows < 1)
			return false;
		return $query->fetch_assoc();
	}
	
	function getParams() {
		global $conn;
		$query = $conn->query("SELECT * FROM `params`");
		$params = array();
		while($par = $query->fetch_assoc()) {
			$params[$par['option']] = $par['value'];
		}
		return $params;
	}
	
	function setParam($key, $value, $text = false) {
		global $conn;
		$insert = $text ? "'" : "";
		return $conn->query("UPDATE `params` SET `value`=$insert$value$insert WHERE `option`='$key'");
	}
?>
