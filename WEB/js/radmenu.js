
var menuRadius = "120px",
    iconWidth = "28px",
    black5 = "rgba(0,0,0,0.5)",
    white5 = "rgba(1,1,1,0.5)";

function registerRadialMenu(inevent, outevent) {
	
	// Angle values
	var startAngle = (135 + 22.5) * Math.PI / 180.0,
		angle = startAngle,
		angleChange = -45 * Math.PI / 180.0 / 2,
		radius = 100,
		expand = radius + 30,
		center = window.innerWidth / 2 - $("#radmenu-item-container i").width() / 2;
	
	// Radial Menu
	$("#radmenu-item-container").on(inevent,
		// Hover in
		function() {
			$("#radmenu").css("box-shadow", "0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19)");
			// Enlarge hover area
			$(this).css({
				"width"                   : (expand * 2) + "px",
				"height"                  : expand + "px",
				"border-top-left-radius"  : expand + "px",
				"border-top-right-radius" : expand + "px",
				"left"                    : "calc(50% - " + expand + "px)"
			});
			// Enable pointer events
			setTimeout(function() {
				$("#radmenu-item-container a, #radmenu-item-container i").each(function() {
					this.style.pointerEvents = "all";
				});
			}, 200);
			// Move icons out
			$("#radmenu-item-container i, #radmenu-item-container small").each(function() {
				$(this).animate({
					"bottom" : (Math.sin(angle) * radius) + "px",
					"left" : (center + Math.cos(angle) * radius) + "px"
				}, 200);
				angle += angleChange;
			});
			angle = startAngle;
		});
	$("#radmenu-item-container").on(outevent,
		// Hover out
		function() {
			$("#radmenu-glow").hide();
			// Shrink hover area
			$(this).css({
				"width"                   : menuRadius,
				"height"                  : "calc(" + menuRadius + " * 0.5)",
				"border-top-left-radius"  : "calc(" + menuRadius + " * 0.5)",
				"border-top-right-radius" : "calc(" + menuRadius + " * 0.5)",
				"left"                    : "calc(50% - " + menuRadius + " * 0.5)"
			});
			// Move icons back in
			$("#radmenu-item-container i, #radmenu-item-container small").each(function() {
				$(this).animate({
					"bottom" : "0",
					"left" : center + "px"
				}, 200);
			});
			// Disable pointer events
			$("#radmenu-item-container a, #radmenu-item-container i").each(function() {
				this.style.pointerEvents = "none";
			});
			$("#radmenu").css("box-shadow", "0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19)");
		});
	
	$("#radmenu-item-container i").on(inevent,
		function() {
			
			// Change icon color
//			$(this).animate({"color" : black5}, 100);
			
			// Move glow into position and fade it in
			$("#radmenu-glow").show();
			var x = $(this).offset().left + $(this).width() / 2  - $("#radmenu-glow").width() / 2,
				y  = $(this).offset().top  + $(this).height() / 2 - $("#radmenu-glow").height() / 2;
			$("#radmenu-glow").offset({
				left: x,
				top: y
			});
			$("#radmenu-glow").hide();
			$("#radmenu-glow").fadeIn(200);
		});
	$("#radmenu-item-container i").on(outevent,
		function() {
		
			// Change icon color back
//			$(this).animate({"color" : white5}, 100);
			
			// Fade glow out
			$("#radmenu-glow").fadeOut(200);
		});
}