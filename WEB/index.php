<?php

include 'header.php';

if (!$loggedIn) {
	redir ( "./login.php" );
}

?>

<br>
<div id="index-content" class="content-pane vert-align">
	<h1>WELCOME, <?php echo strtoupper($firstName); ?></h1>
	<br><br>
	<p>Here on the <?php echo $config['Title']; ?> site, you can sign up and get passes to go to
		classes during <?php echo $config['Title']; ?> every <?php echo $config['Weekday']; ?>. Use the navigation icon
		menu below to begin!</p>
</div>

<?php include 'footer.php' ?>
