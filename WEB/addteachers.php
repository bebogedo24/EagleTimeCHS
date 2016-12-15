<?php

include 'sql.php';
include 'util.php';


if(isset($_GET['dept'])) {
	$dept = $_GET['dept'];
	$first = urldecode($_GET['first']);
	$last = urldecode($_GET['last']);
	$email = urldecode($_GET['email']);
	$username = strtolower(substr($first, 0, 1).$last);
	$password = strtolower($last)."-lion";
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$conn->query("INSERT INTO `users` (`username`, `hash`, `firstName`, `lastName`, `teacher`, `dept`, `email`) VALUES ('$username', '$hash', '$first', '$last', 2, '$dept', '$email')");
	exit;
}



echo file_get_contents("http://hohs.hcpss.org/school-staff");

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/js/init.js"></script>
<script>

$(document).ready(function() {


var matchDept = "-------",
    insert = "----";



$(".node-department").each(function() {

	var dept = $(this).children("h2").html();
	
	if(dept == matchDept) {
		$(this).find(".school-staff-member").each(function() {
			var firstName = encodeURIComponent($(this).find(".field-name-field-staff-first-name").html().trim()),
			    lastName = encodeURIComponent($(this).find(".field-name-field-staff-last-name").html().trim()),
			    email = encodeURIComponent($(this).find(".field-name-field-staff-email a").html().trim());

			ajax("/addteachers.php?dept=" + insert + "&first=" + firstName + "&last=" + lastName + "&email=" + email, function(response) {
				
			});
		});
	}

});


});

</script>