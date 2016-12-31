<?php

include 'sql.php';
include 'util.php';

$loggedIn = checkLoggedIn();

if($loggedIn) {
	$result = $conn->query("SELECT * FROM `users` WHERE `id`=".$_SESSION['userid'])->fetch_assoc();
	
	$username = htmlspecialchars($result['username']);
	$firstName = htmlspecialchars($result['firstName']);
	$lastName = htmlspecialchars($result['lastName']);
	$email = htmlspecialchars($result['email']);
	$gradYear = htmlspecialchars($result['gradYear']);
}

$mobile = isMobile();
$hideMenu = isset($hideMenu) ? $hideMenu : false;

$config = json_decode(file_get_contents("data/CONFIG.json"), true);

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $config['Title']." ".date("Y") ?></title>
	<link href="/css/reset.css" rel="stylesheet" type="text/css">
	
	<!-- Conventional stylesheets, use CSS3 variables
	<link href="/css/style.css" rel="stylesheet" type="text/css">
	<link href="/css/menu-style.css" rel="stylesheet" type="text/css">
	
	For cross-browser support, using PHP variables instead:
	-->
	<?php 
	include './css/style.php';
	include './css/menu-style.php';
	?>
	
	<link rel="stylesheet" type="text/css" href="/css/Hover-master/css/hover.css">
	<link rel="stylesheet" type="text/css" href="/css/Font-Awesome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
	
	<!-- Favicon stuff -->
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/favicon/manifest.json">
	<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#2196f3">
	<link rel="shortcut icon" href="/favicon/favicon.ico">
	<meta name="msapplication-config" content="/favicon/browserconfig.xml">
	<meta name="theme-color" content="#1976d2">
	
	<?php
	// Include different styles if they're on mobile
	if($mobile) { ?>
		<!--  Not using conventional stylesheets <link href="/css/mobile-style.css" rel="stylesheet" type="text/css"> -->
		<?php include './css/mobile-style.php'; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php } ?>
</head>

<body>
	<div id="header">
		<table id="header-table">
			<tr>
				<td>
					<a id="logo-link" href="/index.php"><img id="logo" src="/img/logo_title.png"></a>
				</td>
			</tr>
		</table>
		<?php
		// Check if the menu is supposed to be showing
		if(!$hideMenu) {
		?>
		<!-- Linear drop menu (not currently in use) -->
		<!--
		<div id="dropmenu-container">
			<div id="dropmenu">
				<table><tr><td><i class="fa fa-chevron-down"></i></td></tr></table>
			</div>
			<div id="dropmenu-item-container">
				<a href="#"><i class="fa fa-edit hvr-grow"></i></a>
				<small class="fa fa-circle"></small>
				<a href="#"><i class="fa fa-ticket hvr-grow"></i></a>
				<small class="fa fa-circle"></small>
				<a href="#"><i class="fa fa-cogs hvr-grow"></i></a>
				<br>
			</div>
			<i id="dropmenu-glow" class="fa fa-circle"></i>
		</div>
		-->
		
		<!-- Radial menu (using this one for desktop and mobile) -->
		<div id="radmenu-container">
			<div id="radmenu">
				<table><tr><td><i class="fa fa-chevron-up"></i></td></tr></table>
			</div>
		</div>
		<div id="radmenu-item-container">
			<a href="/signup.php"><i class="fa fa-edit hvr-grow"></i></a>
			<small class="fa fa-circle"></small>
			<a href="/passes.php"><i class="fa fa-ticket hvr-grow"></i></a>
			<small class="fa fa-circle"></small>
			<a href="/settings.php"><i class="fa fa-cogs hvr-grow"></i></a>
			<small class="fa fa-circle"></small>
			<a href="/logout.php"><i class="fa fa-sign-out hvr-grow"></i></a>
		</div>
		<i id="radmenu-glow" class="fa fa-circle"></i>
		<?php } ?>
		
		<!-- Info bar -->
		<div id="info-bar">Error</div>
	</div>
	
	<script src="/js/radmenu.js"></script>
	<script src="/js/transitions.js"></script>
	<script src="/js/init.js"></script>
