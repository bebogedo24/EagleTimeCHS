
// On document initialization
$(document).ready(function() {
	
	var screenWidth = window.innerWidth,
		screenHeight = window.innerHeight,
		mobile = $(".content-pane").css("margin-top") == "999px";
	
	// Position linear drop menu components
	$("#dropmenu-item-container").hide();
	$("#dropmenu-item-container").css("visibility", "visible");
	$("#dropmenu-glow").hide();
	$("#dropmenu-glow").css("visibility", "visible");
	
	
	// Position radial menu components
	$("#radmenu-glow").hide();
	$("#radmenu-glow").css("visibility", "visible");
	
	
	// Position info bar
	$("#info-bar").hide();
	$("#info-bar").css("visibility", "visible");
	
	
	// Position signup submit
	$(".bottom-banner").hide();
	$(".bottom-banner").css("visibility", "visible");
	
	
	// Position content pane components
	$(".vert-align").each(function() {
		var value = screenHeight / 2 - $(this).height() / 2;
		$(this).css({
			"margin-top" : value + "px",
			"visibility" : "visible"
		});
	});
	$(".content-pane:not(.vert-align)").css({
		"margin-top" : $("#header").height() + "px",
		"visibility" : "visible"
	});
	
	// Event Triggers
	var inevent = mobile ? "click" : "mouseenter",
		outevent = mobile ? "unfocus" : "mouseleave";
	
	// Event Listeners
//	registerDropMenu();
	registerRadialMenu(inevent, outevent);
	
	// Transitions
	indexEntrance();
	radialMenuEntrance();
	
	// Info bar
	var params = getQueryParams(window.location.search);
	if("error" in params) {
		var err = params["error"];
		$("#info-bar").html(err);
		$("#info-bar").css("background-color", "var(--negative-500)");
		infoBar();
	}
	else if("success" in params) {
		var succ = params["success"];
		$("#info-bar").html(succ);
		$("#info-bar").css("background-color", "var(--feedback-400)");
		infoBar();
	}
});

function ajax(path, callback) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			callback(this.responseText);
		}
	};
	xhttp.open("GET", path, true);
	xhttp.send();
}

function getQueryParams(qs) {
	qs = qs.split('+').join(' ');
	
	var params = {},
		tokens,
		re = /[?&]?([^=]+)=([^&]*)/g;

	while (tokens = re.exec(qs)) {
		params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	}
	return params;
}
