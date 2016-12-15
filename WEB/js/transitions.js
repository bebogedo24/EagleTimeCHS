
function indexEntrance() {
	
	var screenWidth = window.innerWidth,
		screenHeight = window.innerHeight;
	
	setTimeout(function() {
		$("#index-content p").css({
			"display" : "block",
			"visibility" : "hidden"
		});
		value = screenHeight / 2 - $("#index-content").height() / 2;
		$("#index-content").animate({"margin-top" : value + "px"}, 500);
		setTimeout(function() {
			$("#index-content p").hide();
			$("#index-content p").css("visibility", "visible");
			$("#index-content p").fadeIn(1000);
		}, 300);
	}, 800);
}

function radialMenuEntrance() {
	setTimeout(function() {
		setTimeout(function() {
			$("#radmenu-item-container").css("visibility", "visible");
		}, 100);
		
		$("#radmenu-container").hide();
		$("#radmenu-container").css("visibility", "visible");
		$("#radmenu-container").slideDown(100);
	}, 800);
}

function infoBar() {
	setTimeout(function() {
		$("#radmenu-item-container").hide();
		$("#radmenu-glow").hide();
		$("#radmenu-container").slideUp(200);
		$("#info-bar").slideDown(200);
		
		setTimeout(function() {
			$("#info-bar").slideUp(200);
			$("#radmenu-container").slideDown(200);
			$("#radmenu-item-container").show();
		}, 2000);
	}, 100);
}

function firstTimeTut() {
	
	function tutAni() {
		$("#tutorial .fa-circle-thin").css({
			"right" : "20%",
			"font-size" : "56px",
			"top" : "200px"
		});
		$("#tutorial .fa-circle-thin").animate({"opacity" : "1"}, 100);
		setTimeout(function() {
			$("#tutorial .fa-circle-thin").animate({
				"font-size" : "28px"
			}, 400);
			setTimeout(function() {
				$("#tutorial .fa-circle-thin").animate({"right" : "80%"}, 800);
				setTimeout(function() {
					$("#tutorial .fa-circle-thin").animate({"opacity" : "0"}, 200);
				}, 800);
			}, 600);
		}, 200);
	}
	
	tutAni();
	setInterval(tutAni, 3000);
}