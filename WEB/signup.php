<?php

if(isset($_POST['dept']) and isset($_POST['teacher']) and isset($_POST['purpose']) and isset($_POST['userid'])) {
	
	include 'sql.php';
	include 'util.php';
	
	echo "RUNNING";
	
	$dept = $conn->real_escape_string($_POST['dept']);
	$teacher = $_POST['teacher'];
	$purpose = $conn->real_escape_string($_POST['purpose']);
	$userid = $_POST['userid'];
	
	$conn->query("UPDATE `users` SET `firstTime`=0 WHERE `id`=$userid");
	
	$conn->query("INSERT INTO `signups` (`studentId`, `teacherId`, `dept`, `purpose`, `time`) VALUES
					($userid, $teacher, '$dept', '$purpose', ".time().")");
	
	redir("./passes.php");
}

include 'header.php';

if (!$loggedIn) {
	redir ( "./login.php" );
}

$depts = getDeptartments();
$purposes = getPurposes();

$currentAmount = $conn->query("SELECT COUNT(*) AS `count` FROM `signups` WHERE `studentId`=".$_SESSION['userid'])->fetch_assoc()['count'];

$firstTime = $conn->query("SELECT `firstTime` FROM `users` WHERE `id`=".$_SESSION['userid'])->fetch_assoc()['firstTime'] == 1;

?>

<br>
<div id="signup-content" class="content-pane form">
	<h1>SIGN UP</h1>
	<br><br>
	<form method="post">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<h2>SELECT A DEPARTMENT</h2>
					<br><br>
					<div class="swiper-slide-box columns">
						<?php
							foreach($depts as $dept => $deptKey) {
								echo "<input type='radio' name='dept' value='$deptKey' id='radio-dept-$deptKey' onchange='updateTeachers(this);'><label for='radio-dept-$deptKey'><span></span> $dept</label><br>";
							}
						?>
					</div>
				</div>
				<div class="swiper-slide">
					<h2>SELECT A TEACHER</h2>
					<br><br>
					<div class="swiper-slide-box" id="signup-teachers">
						
					</div>
				</div>
				<div class="swiper-slide">
					<h2>SELECT A PURPOSE</h2>
					<br><br>
					<div class="swiper-slide-box">
						<?php
							foreach($purposes as $purp => $purpKey) {
								echo "<input type='radio' name='purpose' value='$purpKey' id='radio-purpose-$purpKey'><label for='radio-purpose-$purpKey'><span></span> $purp</label><br>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php if(getParams()['enabled'] == 1) { ?>
		
			<?php if($currentAmount < 2) { ?>
				<div id="signup-submit" class="bottom-banner"><table><tr><td><i class="fa fa-check"></i> Submit</td></tr></table></div>
			<?php } else { ?>
				<div id="signup-deny" class="bottom-banner"><table><tr><td>You've already signed up twice.</td></tr></table></div>
			<?php } ?>
		
		<?php } else { ?>
			<div id="signup-deny" class="bottom-banner"><table><tr><td>Signups are closed.</td></tr></table></div>
		<?php } ?>
		
		<input type="hidden" name="userid" value=<?php echo '"'.$_SESSION['userid'].'"'; ?>>
	</form>
	<br><br><br><br>
</div>
<script src="/js/swiper.jquery.min.js"></script>
<?php if($firstTime) { ?>
<script src="/js/transitions.js"></script>
<script>
$(document).ready(function() {
	firstTimeTut();
});
</script>
<div id="tutorial">
	<i class="fa fa-circle-thin no-select"></i>
	<span class="no-select tut-instructions">Swipe to access teachers and purposes!</span>
	<br>
	<span class="no-select tut-gotit">Got it!</span>
</div>
<?php } ?>

<link href="/css/swiper.min.css" rel="stylesheet" type="text/css">
<script>

var dept = null,
	readyToSubmit = false;
function updateTeachers(radio) {
	if(radio.checked) {
		ajax("/grab-teachers.php?dept=" + radio.value, function(response) {
			var teachers = JSON.parse(response),
				inputs = "";
			for(i in teachers) {
				var teacher = teachers[i];
				
				inputs += "<input type='radio' name='teacher' value='" + teacher.id +
					"' id='radio-teacher-" + teacher.id + "' onchange='checkForm();'><label for='radio-teacher-" + teacher.id +
					"'><span></span> " + teacher.firstName + " " + teacher.lastName + "</label><br>";
			}
			$("#signup-teachers").html(inputs)
		});
	}
}

function checkForm() {
	var deptChecked = $("#signup-content input[type=radio][name=dept]:checked").length > 0,
		teacherChecked = $("#signup-content input[type=radio][name=teacher]:checked").length > 0,
		purposeChecked = $("#signup-content input[type=radio][name=purpose]:checked").length > 0;

	if(!readyToSubmit) {
		readyToSubmit = deptChecked && teacherChecked && purposeChecked;

		if(readyToSubmit) {
			$("#radmenu-item-container").hide();
			$("#radmenu-glow").hide();
			$("#radmenu-container").slideUp(200);

			$(".bottom-banner").slideDown(200);
		}
	}
}

function submit() {
	$("#signup-content form").submit();
}

function toIndex() {
	window.location = "/passes.php";
}

$(document).ready(function() {
	var mySwiper = new Swiper('.swiper-container', {
		grabCursor: true
	});

	$("#signup-content input[type=radio]").change(checkForm);
	$("#signup-submit").click(submit);
	$("#signup-deny").click(toIndex);
});

$("#tutorial .tut-gotit").click(function() {
	$("#tutorial").animate({"opacity" : "0"}, 200);
	setTimeout(function() {
		$("#tutorial").remove();
	}, 200);
});

</script>

<?php include 'footer.php' ?>
