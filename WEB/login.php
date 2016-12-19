<?php

// If form has been submitted
if(isset($_POST['submit'])) {
	
	include_once 'util.php';
	include_once 'sql.php';
	
	// If any fields are missing
	if(!isset($_POST['username']) or !isset($_POST['password']))
		redirError("./login.php", "Invalid query parameters.");
	
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	
	// If any fields are blank
	if($username == "" or $password == "")
		redirError("./login.php", "All fields must be filled in.");

	$query = $conn->query("SELECT * FROM `users` WHERE `username`='$username'");
	
	// If user exists
	if($query->num_rows < 1)
		redirError("./login.php", "Oops, that username isn't right.");
	
	$result = $query->fetch_assoc();
	
	// If inputted password matches the hash in the database
	if(!password_verify($password, $result['hash']))
		redirError("./login.php", "That password isn't right.");
	
	// Start a session
	session_set_cookie_params(60 * 60);
	session_start();
	
	$_SESSION['userid'] = $result['id'];
	
	redir("./index.php");
}

$hideMenu = true;

include 'header.php';

if($loggedIn)
	redir("./index.php");

?>

<br>
<div id="login-content" class="content-pane form vert-align">
	<h2>SIGN IN</h2>
	<form method="post">
		<br>
		<input name="username" type="text" placeholder="Username">
		<br><br>
		<input name="password" type="password" placeholder="Password">
		<br>
		<small>Need an account? <a href="/register.php" class="link">Sign up.</a></small>
		<br><br>
		<input name="submit" type="submit" value="Sign in">
	</form>
</div>

<?php include 'footer.php' ?>
