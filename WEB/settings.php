<?php

// If form has been submitted
if (isset ( $_POST ['submit'] )) {
	
	include_once 'util.php';
	include_once 'sql.php';
	
	$userId = $conn->real_escape_string($_POST['userid']);
	
	// Update username
	if(isset($_POST['new-username'])) {
		$username = $conn->real_escape_string($_POST['new-username']);
		if($username != $_POST['username'] and $username != "") {
			
			// If username is taken
			$count = $conn->query ( "SELECT COUNT(*) AS `count` FROM `users` WHERE `username`='$username'" )->fetch_assoc () ['count'];
			if ($count > 0)
				redirError ( "./settings.php", "Oops, that username is taken." );
			
			$conn->query("UPDATE `users` SET `username`='$username' WHERE `id`=$userId");
		}
	}
	
	// Update email
	if(isset($_POST['new-email'])) {
		$email = $conn->real_escape_string($_POST['new-email']);
		if($email != $_POST['email'] and $email != "") {
			
			// If email is already used
			$count = $conn->query ( "SELECT COUNT(*) AS `count` FROM `users` WHERE `email`='$email'" )->fetch_assoc () ['count'];
			if ($count > 0)
				redirError ( "./settings.php", "It looks like there's already an account with that email." );
			
			// If email is valid
			if (! filter_var ( $email, FILTER_VALIDATE_EMAIL ))
				redirError ( "./settings.php", "Oops, that email address isn't right." );
				
			$conn->query("UPDATE `users` SET `email`='$email' WHERE `id`=$userId");
		}
	}

	// Update first name
	if(isset($_POST['new-firstName'])) {
		$firstName = $conn->real_escape_string($_POST['new-firstName']);
		if($firstName != $_POST['firstName'] and $firstName != "")
			$conn->query("UPDATE `users` SET `firstName`='$firstName' WHERE `id`=$userId");
	}
	
	// Update last name
	if(isset($_POST['new-lastName'])) {
		$lastName = $conn->real_escape_string($_POST['new-lastName']);
		if($lastName != $_POST['lastName'] and $lastName != "")
			$conn->query("UPDATE `users` SET `lastName`='$lastName' WHERE `id`=$userId");
	}
	
	// Update grad year
	if(isset($_POST['new-gradYear'])) {
		$gradYear = $conn->real_escape_string($_POST['new-gradYear']);
		if($gradYear != $_POST['gradYear'] and $gradYear != "")
			$conn->query("UPDATE `users` SET `gradYear`=$gradYear WHERE `id`=$userId");
	}
	
	// Update max students
	if(isset($_POST['new-maxStudents'])) {
		$maxStudents = $conn->real_escape_string($_POST['new-maxStudents']);
		if($maxStudents != $_POST['maxStudents'] and $maxStudents != "")
			$conn->query("UPDATE `users` SET `maxStudents`=$maxStudents WHERE `id`=$userId");
	}

	redir ( "./settings.php" );
}

include 'header.php';

if (! $loggedIn) {
	redir ( "./login.php" );
}

$minYear = intval ( date ( "Y" ) ) - 1;
$maxYear = $minYear + 6;

$userData = getUserData ( $_SESSION ['userid'] );


$isTeacher = $userData['teacher'] > 0;


$students = array();

if($isTeacher)
	$students = getStudents($userData['id']);

?>

<br>
<div id="settings-content" class="content-pane">
	<h1>SETTINGS</h1>
	<br>
	<div class="card" id="settings-aboutme">
		<h2>About Me</h2>
		<br>
		<br>
		<form method="post">
			<table>
				<tr>
					<td>
						<span>Username: </span>
					</td>
					<td>
						<input name="new-username" type="text"
							value=<?php echo "'".$userData['username']."'"; ?>>
					</td>
				</tr>
				<tr>
					<td>
						<span>Email: </span>
					</td>
					<td>
						<input name="new-email" type="email"
							value=<?php echo "'".$userData['email']."'"; ?>>
					</td>
				</tr>
				<tr>
					<td>
						<span>First Name: </span>
					</td>
					<td>
						<input name="new-firstName" type="text"
							value=<?php echo "'".$userData['firstName']."'"; ?>>
					</td>
				</tr>
				<tr>
					<td>
						<span>Last Name: </span>
					</td>
					<td>
						<input name="new-lastName" type="text"
							value=<?php echo "'".$userData['lastName']."'"; ?>>
					</td>
				</tr>
				<tr>
					<td>
						<span>Graduation Year: </span>
					</td>
					<td>
						<input name="new-gradYear" type="number"
							value=<?php echo "'".$userData['gradYear']."'"; ?>
							min=<?php echo "'$minYear'"; ?> max=<?php echo "'$maxYear'"; ?>>
					</td>
				</tr>
				<?php if($isTeacher) { ?>
				<tr>
					<td>
						<span>Max Students: </span>
					</td>
					<td>
						<input name="new-maxStudents" type="number"
							value=<?php echo "'".$userData['maxStudents']."'"; ?>
							min='0'>
					</td>
				</tr>
				<?php } ?>
			</table>
			<br>
			<input name="submit" type="submit" value="Save Settings">
			
			<input name="username" type="hidden" value=<?php echo "'".$userData['username']."'"; ?>>
			<input name="email" type="hidden" value=<?php echo "'".$userData['email']."'"; ?>>
			<input name="firstName" type="hidden" value=<?php echo "'".$userData['firstName']."'"; ?>>
			<input name="lastName" type="hidden" value=<?php echo "'".$userData['lastName']."'"; ?>>
			<input name="gradYear" type="hidden" value=<?php echo "'".$userData['gradYear']."'"; ?>>
			<input name="userid" type="hidden" value=<?php echo "'".$_SESSION['userid']."'"; ?>>
			<input name="maxStudents" type="hidden" value=<?php echo "'".$_SESSION['maxStudents']."'"; ?>>
		</form>
	</div>
	
	<?php if($isTeacher) { ?>
	
	<br>
	<div class="card" id="settings-students">
		<h2>My Students</h2>
		<p><?php echo sizeof($students)." student".(sizeof($students) == 1 ? "" : "s"); ?></p>
		<br>
		<ul>
			<?php 
			
			foreach($students as $student) {
				$name = getUserData($student['studentId']);
				echo "<li>".$name['firstName']." ".$name['lastName']."</li>";
			}
			
			?>
		</ul>
	</div>
	
	<?php } ?>
</div>

<?php include 'footer.php' ?>
