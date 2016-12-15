
<?php 

$mobileStyle = <<<COF

<style>

#register-content input:not([type="submit"]) {
	width: 35%;
}

#index-content p {
	width: 60%;
}

.swiper-slide-box {
	width: 85%;
	text-align: center;
}

.columns {
	-moz-column-count: 2;
	-moz-column-gap: 0px;
	-webkit-column-count: 2;
	-webkit-column-gap: 0px;
	column-count: 2;
	column-gap: 0px;
}

.form input[type=radio] + label span {
	display: none;
}

.form input[type=radio] + label {
	display: inline-block;
	vertical-align: middle;
	cursor: pointer;
	margin: 6px;
	padding: 12px;
	width: 75%;
	text-align: center;
	
	border-radius: 10px;
	border: 4px solid $white7;
	--webkit-transition: background-color 0.2s;
	transition: background-color 0.2s;
}

.form input[type=radio]:checked + label {
	background-color: $black5;
	border: 4px solid $whiteFull;
}

#pass-container {
	width: 80%;
}

.pass-slide-wrapper small {
	margin-top: 20px;
}

#settings-aboutme {
	width: 80%;
}
		
</style>

COF;

echo $mobileStyle;

?>