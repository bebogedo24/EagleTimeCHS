
function registerDropMenu() {
	// Linear drop menu hover functions
	$("#dropmenu-container").hover(
		// Hover in
		function() {
			$("#dropmenu").css("box-shadow", "0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19)");
			$("#dropmenu-item-container").slideDown(200);
		},
		// Hover out
		function() {
			$("#dropmenu-glow").hide();
			$("#dropmenu-item-container").slideUp(200);
			$("#dropmenu").css("box-shadow", "0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19)");
		});
	
	// Linear drop menu item hover functions
	$("#dropmenu-item-container i").hover(
		// Hover in
		function() {
			$("#dropmenu-glow").show();
			var x = $(this).offset().left + $(this).width() / 2  - $("#dropmenu-glow").width() / 2,
				y  = $(this).offset().top  + $(this).height() / 2 - $("#dropmenu-glow").height() / 2;
			$("#dropmenu-glow").offset({
				left: x,
				top: y
			});
			$("#dropmenu-glow").hide();
			$("#dropmenu-glow").fadeIn(200);
		},
		// Hover out
		function() {
			$("#dropmenu-glow").fadeOut(200);
		});
}
