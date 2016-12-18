<?php
include 'header.php';

if (! $loggedIn) {
	redir ( "./login.php" );
}

$signups = getSignups ( $_SESSION ['userid'] );
$depts = getDeptartments();
$purposes = getPurposes();

?>

<br>
<div id="passes-content" class="content-pane">
	<h1>PASSES</h1>
	<br><br>
	
	<?php if(sizeof($signups) > 0) { ?>
	<div id="pass-container">
		<div class="swiper-container">
			<div class="swiper-wrapper">
			<?php
			
			foreach($signups as $pass) { 
				$teacher = getUserData($pass['teacherId']);
				$student = getUserData($pass['studentId']);
				$date = date("M d Y", $pass['time']);
				?>
				<div class="swiper-slide">
					<div class="pass-slide-wrapper" id=<?php echo "'pass-".$pass['id']."'"; ?>>
						<h2><?php echo $teacher['firstName']." ".$teacher['lastName']; ?></h2>
						<br>
						<p><?php echo lookup($pass['dept'], $depts); ?></p>
						<br>
						<p>for <?php echo lookup($pass['purpose'], $purposes); ?></p>
						<small><?php echo $student['firstName']." ".$student['lastName']." | ".$date; ?></small>
						
						<div class="pass-background"></div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<br>
	<p>Screenshot your pass to use during Eagle Time!</p>
	<!-- <div id="pass-save-button" class="no-select"><i class="fa fa-download"></i> Save Pass</div> -->
	<div id="pass-delete-button" class="no-select"><i class="fa fa-trash"></i> Delete Pass</div>
	<?php } else { ?>
	
	<h2 id="no-signups">You haven't signed up.</h2>
	<p><a href="/signup.php" class="link">Sign up now.</a></p>
	
	<?php } ?>
	<br><br>
</div>
<img id="pass-watermark" src="/img/pass_watermark.png" style="display: none;">

<link href="/css/swiper.min.css" rel="stylesheet" type="text/css">
<script src="/js/swiper.jquery.min.js"></script>
<script>

$(document).ready(function() {
	var mySwiper = new Swiper('.swiper-container', {
		grabCursor: true
	});

// 	var slideWidth = $(".pass-slide-wrapper").outerWidth(),
// 		slideHeight = $(".pass-slide-wrapper").outerHeight();

	// Draw pass canvas -- not using canvas method right now
// 	$(".pass-canvas").each(function() {
// 		this.width = slideWidth;
// 		this.height = slideHeight;
// 		var ctx = this.getContext('2d');

// 		// Fill background
// 		ctx.fillStyle = '#FFF';
// 		ctx.fillRect(0, 0, this.width, this.height);
		
// 		// Draw watermark
// 		var wm = document.getElementById("pass-watermark"),
// 			imgW = this.width * 0.8, imgH = imgW * wm.height / wm.width;
// 		ctx.globalAlpha = 0.05;
// 		ctx.drawImage(wm, this.width / 2 - imgW / 2, this.height / 2 - imgH / 2, imgW, imgH);
// 		ctx.globalAlpha = 1;

// 		// Draw text
// 		ctx.textAlign = "center";
// 		ctx.font = "24px Oswald";
// 		ctx.fillStyle = "#000";
// 		ctx.fillText("Hello!", 100, 100);
// 	});

	
	$("#pass-delete-button").click(function() {
		var passId = $(".swiper-slide-active .pass-slide-wrapper").attr("id").replace("pass-", "");
		window.location = "/delete-pass.php?hash=d5b286be928fed6ae2211bb899414faf&pass=" + passId;
	});
});

</script>

<?php include 'footer.php' ?>
