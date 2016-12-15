<?php 

$menuRadius = "120px";
$iconWidth = "28px";

$menuStyle = <<<DOF

<style>

/* ----------- Drop Menu ----------- */

#dropmenu {
	width: 80px;
	height: 80px;

	border-radius: 15px;
	background-color: $whiteFull;
	text-align: center;
	vertical-align: middle;
	font-size: 28px;
	box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0
		rgba(0, 0, 0, 0.19);
}
#dropmenu table {
	width: 100%;
	height: 100%;
}
#dropmenu i {
	color: $black7;
}

#dropmenu:HOVER {
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}

#dropmenu-container {
	width: 80px;
	position: fixed;
	right: 0px;
	
	margin: 30px 50px;
	text-align: center;
}

#dropmenu-item-container {
	width: 40px;
	visibility: hidden;
	
	margin: 0 auto;
	text-align: center;
}
#dropmenu-item-container i {
	display: block;
	margin: 0 auto;
	margin-top: 20px;
	font-size: 28px;
	color: $black7;
}
#dropmenu-item-container small {
	display: block;
	margin: 0 auto;
	margin-top: 20px;
	font-size: 4px;
	color: $black7;
}

#dropmenu-glow {
	position: absolute;
	font-size: 56px;
	visibility: hidden;
	z-index: -1;
	color: $whiteFull;
	
	-webkit-filter: blur(10px);
	-moz-filter: blur(10px);
	-ms-filter: blur(10px);
	-o-filter: blur(10px);
	filter: blur(10px);
}


/* Radial Menu */

#radmenu {
	
	width: $menuRadius;
	height: $menuRadius;
	border-radius: calc($menuRadius * 0.5);
	
	position: relative;
	bottom: 0;

	font-size: 28px;
	background-color: $whiteFull;
	box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0
		rgba(0, 0, 0, 0.19);
}
#radmenu table {
	width: 100%;
	height: 50%;
}
#radmenu i {
	color: $black7;
}

#radmenu:HOVER {
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}

#radmenu-container {
	text-align: center;
	height: 60px;
	
	position: fixed;
	bottom: 0;
	left: calc(50% - $menuRadius * 0.5);
	pointer-events: none;
	
	visibility: hidden;
}

#radmenu-item-container {
	width: $menuRadius;
	height: calc($menuRadius * 0.5);

	position: fixed;
	bottom: 0;
	left: calc(50% - $menuRadius * 0.5);
	z-index: -5;
	visibility: hidden;
		
	border-top-left-radius: calc($menuRadius * 0.5);
	border-top-right-radius: calc($menuRadius * 0.5);
}
#radmenu-item-container i, #radmenu-item-container small {
	font-size: $iconWidth;
	width: $iconWidth;
	color: $white7;
	
	position: fixed;
	bottom: 0;
	left: calc(50% - $iconWidth * 0.5);
	
	pointer-events: none;
}

#radmenu-item-container a {
	pointer-events: none;
}

#radmenu-item-container small {
	font-size: 4px;
	text-align: center;
}

#radmenu-glow {
	position: fixed;
	font-size: 56px;
	visibility: hidden;
	z-index: -6;
	color: $whiteFull;
	color: transparent;
	
	-webkit-filter: blur(10px);
	-moz-filter: url(blur.svg#blur);
	-ms-filter: url(blur.svg#blur);
	-o-filter: url(blur.svg#blur);
	filter: url(blur.svg#blur);
}


/* Info Bar */

#info-bar {
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
	padding: 20px 0;
	color: $whiteFull;
	background-color: $black7;
	text-align: center;
	z-index: 20;
	visibility: hidden;
	
	font-family: "Oswald", sans-serif;
	font-size: 22px;
	box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0
		rgba(0, 0, 0, 0.19);
}

</style>

DOF;

echo $menuStyle;

?>