<?php

// If form has been submitted
if(isset($_POST['submit'])) {
	
	include_once 'util.php';
	include_once 'sql.php';
	
	// If any fields are missing
	if(!isset($_POST['username']) or !isset($_POST['password']) or !isset($_POST['repassword']) or
			!isset($_POST['email']) or !isset($_POST['gradYear']) or
			!isset($_POST['firstName']) or !isset($_POST['lastName']))
		redirError("./register.php", "Invalid query parameters.");
	
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$email = $conn->real_escape_string($_POST['email']);
	$repass = $conn->real_escape_string($_POST['repassword']);
	$gradYear = intval($_POST['gradYear']);
	$firstName = $conn->real_escape_string($_POST['firstName']);
	$lastName = $conn->real_escape_string($_POST['lastName']);
	
	// If any fields are blank
	if($username == "" or $password == "" or $repass == "" or $email == "" or $firstName == "" or $lastName == "")
		redirError("./register.php", "All fields must be filled in.");

	// If username is taken
	$count = $conn->query("SELECT COUNT(*) AS `count` FROM `users` WHERE `username`='$username'")->fetch_assoc()['count'];
	if($count > 0)
		redirError("./register.php", "Oops, that username is taken.");

	// If passwords match
	if($password != $repass)
		redirError("./register.php", "Those passwords aren't the same.");
	
	// If password is long enough
	if(strlen($password) < 6)
		redirError("./register.php", "Your password must be at least 6 characters.");
	
	// If email is valid
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		redirError("./register.php", "Oops, that email address isn't right.");
	
	// If email is already used
	$count = $conn->query("SELECT COUNT(*) AS `count` FROM `users` WHERE `email`='$email'")->fetch_assoc()['count'];
	if($count > 0)
		redirError("./register.php", "It looks like there's already an account with that email.");
	
	
	// Hash the password
	$hash = password_hash($password, PASSWORD_DEFAULT);
	// Insert into database
	$conn->query("INSERT INTO `users` (`username`, `hash`, `email`, `firstName`, `lastName`, `gradYear`) VALUES 
			('$username', '$hash', '$email', '$firstName', '$lastName', $gradYear)");
	
	// Start a session
	session_set_cookie_params(60 * 60);
	session_start();
	
	$result = $conn->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch_assoc();
	$_SESSION['userid'] = $result['id'];
	
	redir("./index.php");
}

$hideMenu = true;

include 'header.php';

if($loggedIn)
	redir("./index.php");

$minYear = intval(date("Y")) - 1;
$maxYear = $minYear + 6;

?>

<br>
<div id="register-content" class="content-pane form vert-align">
	<h2>REGISTER</h2>
	<form method="post">
		<br>
		<input name="username" type="text" placeholder="Username">
		<span class="spanspace"></span>
		<input name="email" type="email" placeholder="Email">
		<br><br>
		<input name="firstName" type="text" placeholder="First Name">
		<span class="spanspace"></span>
		<input name="lastName" type="text" placeholder="Last Name">
		<br><br>
		<input name="password" type="password" placeholder="Password">
		<span class="spanspace"></span>
		<input name="repassword" type="password" placeholder="Retype Password">
		<br><br>
		<input name="gradYear" type="number" placeholder="Graduation Year" min=<?php echo "'$minYear'"; ?>>
		<br>
		<small>Already have an account? <a href="/login.php" class="link">Sign in.</a></small>
		<br><br>
		<input name="submit" type="submit" value="Register">
	</form>
</div>

<?php include 'footer.php' ?>
