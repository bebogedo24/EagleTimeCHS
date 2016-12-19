<?php

include 'sql.php';

if(!isset($_GET['dept']))  {
	echo "[]";
	exit;
}

$dept = $conn->real_escape_string($_GET['dept']);

$teachers = array();

$query = $conn->query("SELECT * FROM `users` WHERE `teacher` > 1 AND (`dept`='$dept' OR `secondaryDept`='$dept')");

if($query->num_rows > 0) {
	while($result = $query->fetch_assoc()) {
		if($conn->query("SELECT COUNT(*) AS `count` FROM `signups` WHERE `teacherId`=".$result['id'])->fetch_assoc()['count'] > $result['maxStudents'])
			continue;
		unset($result['hash']);
		unset($result['teacher']);
		unset($result['gradYear']);
		array_push($teachers, $result);
	}
}

echo json_encode($teachers);

?>
