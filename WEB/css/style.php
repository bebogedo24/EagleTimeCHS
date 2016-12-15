
<?php 

$color500 = "#2196F3";
$color300 = "#64B5F6";
$color700 = "#1976D2";

// Get colors from config
$config = json_decode(file_get_contents("data/CONFIG.json"), true);
$color300 = $config['Light_Color'];
$color700 = $config['Dark_Color'];

$accent400 = "#FFC400";
$accent700 = "#FFAB00";

$feedback400 = "#00E676";
$feedback550 = "#00D764";
$feedback700 = "#00C853";

$negative500 = "#F44336";
$negative600 = "#E53935";

$blackFull = "#000";
$black9 = "rgba(0, 0, 0, 0.9)";
$black7 = "rgba(0, 0, 0, 0.7)";
$black5 = "rgba(0, 0, 0, 0.5)";
$black3 = "rgba(0, 0, 0, 0.3)";
$black1 = "rgba(0, 0, 0, 0.1)";

$whiteFull = "#FFF";
$white7 = "rgba(255, 255, 255, 0.9)";
$white7 = "rgba(255, 255, 255, 0.7)";
$white5 = "rgba(255, 255, 255, 0.5)";
$white3 = "rgba(255, 255, 255, 0.3)";
$white1 = "rgba(255, 255, 255, 0.1)";

$style = <<<EOF

<style>

@font-face {
	font-family: Roboto;
	src: url('/css/Roboto-Regular.ttf');
}

@font-face {
	font-family: College;
	src: url('/css/college.ttf');
}

* {	
	padding: 0px;
	margin: 0px;
	color: $black7;
	font-family: 'Roboto', sans-serif;
	text-decoration: none;
}
*:FOCUS {
	outline: none;
}

html {
	min-height: 100%;
	position: relative;
}

body {
	background-color: $color300;
	margin: 0px 0px 30px;
	
	background: linear-gradient(rgba(0,0,0,0), $color700); /* Standard syntax */
	background-color: $color300;
}

td { vertical-align: middle; }

h2 {
	font-family: 'Oswald', sans-serif;
	font-size: 24px;
	border-bottom: 2px solid $whiteFull;
	padding-bottom: 8px;
	color: $whiteFull;
	text-align: center;
	display: inline-block;
	font-weight: normal;
}

.content-pane small {
	font-family: 'Roboto', sans-serif;
	font-size: 12px;
	color: $white7;
	text-align: center;
	display: inline-block;
	font-weight: normal;
	padding-top: 8px;
	width: 50%;
}

.link {
	font-family: inherit;
	font-size: inherit;
	color: inherit;
	font-weight: inherit;
}

.link:HOVER {
	text-decoration: underline;
}

.spanspace {
	padding: 0 3px;
}

.no-select {
	-webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.card {
	background-color: $whiteFull;
	margin: 30px;
	padding: 40px;
	display: inline-block;
	box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 16px 0
		rgba(0, 0, 0, 0.19);
}

.card h2 {
	color: $black7;
	border-color: $black7;
	margin: 0;
}

/* ----------- Header ----------- */

#header {
	width: 100%;
	height: 100px;
	position: fixed;
	z-index: 10;
	
	background-color: $black5;
	
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0
		rgba(0, 0, 0, 0.19)
}

#header-table {
	width: 100%;
	height: 100%;
}

#logo {
	height: 80px;
	margin-left: 20px;
}


/* Content Styles */

.content-pane {
	margin: 0 auto;
	text-align: center;
	visibility: hidden;
}

.content-pane h1 {
	font-size: 48px;
	font-family: 'Oswald', sans-serif;
	font-weight: normal;
	text-align: center;
	color: $whiteFull;
	display: inline-block;
	
	padding-bottom: 12px;
	border-bottom: 4px solid $whiteFull;
}

.content-pane p {
	color: $white5;
	margin: 10px auto;
	width: 50%;
	font-size: 14px;
	line-height: 18px;
}



/* Form Styles */

.form input {
	margin-top: 8px;
	padding: 10px;
	border: 2px solid $whiteFull;
	background-color: $white1;
	color: $whiteFull;
}

.form input[type=submit] {
	background-color: $black5;
	color: $whiteFull;
	border: none;
	border-radius: 3px;
	padding: 10px 15px;
	
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19)
}
.form input[type=submit]:HOVER {
	background-color: $black7;
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0
		rgba(0, 0, 0, 0.19);
}

.form input[type=radio] {
	display: none;
}
.form input[type=radio] + label {
	padding: 0;
}
.form input[type=radio] + label span {
	display: inline-block;
	width: 30px;
	height: 30px;
	vertical-align: middle;
	cursor: pointer;
	margin: 6px;
	
	border-radius: 19px;
	border: 4px solid $whiteFull;
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
}
.form input[type=radio]:checked + label span {
	background-color: $black5;
}

.form label {
	color: $white7;
	padding: 40px 20px;
}

::-webkit-input-placeholder {
	color: $white7;
	opacity: 1;
}
:-moz-placeholder { /* Firefox 18- */
	color: $white7;
	opacity: 1;
}
::-moz-placeholder {  /* Firefox 19+ */
	color: $white7;
	opacity: 1;
}
:-ms-input-placeholder {  
	color: $white7;
	opacity: 1;
}

/* Index Transitions */

#index-content p {
	display: none;
}

/* Signup Styles */

.columns {
	-moz-column-count: 3;
	-moz-column-gap: 33%;
	-webkit-column-count: 3;
	-webkit-column-gap: 33%;
	column-count: 3;
	column-gap: 33%;
}

.swiper-slide-box {
	width: 50%;
	height: 100%;
	margin: 0 auto;
	text-align: left;
}

.bottom-banner {
	position: fixed;
	width: 100%;
	height: 60px;
	left: 0;
	bottom: 0;
	text-align: center;
	
	border: none;
	visibility: hidden;
	vertical-align: middle;
	cursor: pointer;
	z-index: 20;
	
	box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0
		rgba(0, 0, 0, 0.19);
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
}
.bottom-banner:HOVER {
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}
.bottom-banner table {
	width: 100%;
	height: 100%;
}
.bottom-banner * {
	color: $whiteFull;
	font-size: 22px;
}
.bottom-banner td {
	font-family: 'Oswald', sans-serif;
}

#signup-submit {
	background-color: $feedback400;
}
#signup-submit:HOVER {
	background-color: $feedback550;
}
#signup-deny {
	background-color: $negative500;
}
#signup-deny:HOVER {
	background-color: $negative600;
}


/* Pass Styles */

#pass-container {
	width: 50%;
	background-color: $black1;
	box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), inset 0 3px 10px
		rgba(0, 0, 0, 0.19);
	display: inline-block;
	z-index: 50;
}

.pass-slide-wrapper {
	margin: 30px;
	padding: 40px;
	background-color: $whiteFull;
	height: 100%;
	border-radius: 3px;
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0
		rgba(0, 0, 0, 0.19);
}

.pass-background {
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background-image: url(/img/pass_watermark.png);
	background-repeat: no-repeat;
	background-position: center;
	background-size: 80%;
	opacity: 0.05;
}

.pass-slide-wrapper h2 {
	color: $black7;
	border: none;
	padding: 0;
	margin: 0;
}

.pass-slide-wrapper p {
	color: $black5;
	padding: 0;
	margin: 0;
	width: auto;
}

.pass-slide-wrapper small {
	color: $black7;
	padding: 0;
	margin: 0;
	margin-top: 40px;
}

#pass-save-button {
	background-color: $feedback400;
	padding: 10px 30px;
	display: inline-block;
	margin: 0 auto;
	cursor: pointer;
	
	color: $whiteFull;
	border-radius: 3px;
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}

#pass-save-button:HOVER {
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0
		rgba(0, 0, 0, 0.19);
	background-color: $feedback550;
}

#pass-save-button i {
	color: $whiteFull;
	margin-right: 5px;
}

#pass-delete-button {
	background-color: $negative500;
	padding: 10px 30px;
	display: inline-block;
	margin: 0 auto;
	cursor: pointer;
	
	color: $whiteFull;
	border-radius: 3px;
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}

#pass-delete-button:HOVER {
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0
		rgba(0, 0, 0, 0.19);
	background-color: $negative600;
}

#pass-delete-button i {
	color: $whiteFull;
	margin-right: 5px;
}

#no-signups {
	border: none;
	padding: 0;
	margin-top: 20px;
}

/* Settings Styles */

#settings-aboutme {
	width: 40%;
	padding-left: 0;
	padding-right: 0;
}

#settings-aboutme table {
	width: 100%;
	table-layout: fixed;
}

#settings-aboutme td:FIRST-CHILD {
	text-align: right;
}

#settings-aboutme td:not(:FIRST-CHILD) {
	text-align: left;
}

#settings-content input {
	padding: 8px;
	border: none;
	background-color: transparent;
	color: $black7;
}

#settings-content input[type=submit] {
	background-color: $black7;
	color: $whiteFull;
	border: none;
	border-radius: 3px;
	padding: 10px 15px;
	
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0
		rgba(0, 0, 0, 0.19);
}
#settings-content input[type=submit]:HOVER {
	background-color: $black9;
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0
		rgba(0, 0, 0, 0.19);
}

#settings-students {
	width: 35%;
}

#settings-students ul {
	width: 60%;
	height: 100px;
	overflow: scroll;
	overflow-x: hidden;
	overflow-y: scroll;
	margin: 0 auto;
	background-color: $black1;
	padding: 10px;
}

#settings-students p {
	color: $black7;
}
			
#watermark {
	position: absolute;
	bottom: 0;
	margin: 15px 20px;
	color: $white3;
	font-size: 12px;
}
			
#tutorial {
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: 1000;
	background-color: $black7;
	text-align: center;
}
			
#tutorial .tut-gotit {
	display: inline-block;
	padding: 20px;
	color: $whiteFull;
	font-family: 'Oswald', sans-serif;
	text-transform: uppercase;
	font-size: 28px;
	cursor: pointer;
	background-color: $white1;
	transition: background-color 0.2s;
	border-radius: 3px;
	margin-top: 200px;
}

#tutorial .tut-gotit:hover {
	background-color: $white3;
}

#tutorial .tut-instructions {
	display: inline-block;
	color: $whiteFull;
	font-family: 'Roboto', sans-serif;
	font-size: 28px;
	margin-top: 100px;
}

#tutorial .fa-circle-thin {
	color: $whiteFull;
	position: fixed;
	top: 200px;
	right: 20%;
	opacity: 0;
}

</style>

EOF;

echo $style;

?>