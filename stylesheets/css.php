<?php
header('content-type:text/css');
header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900)) . " GMT"); 
/* Company Colours */ 
$blue='#369';
$green='#363';
$lgreen='#cfc';
$color1='#ddeef6';		/* Light blue-green*/
$color2='#27b';				/* Deep Blue */
$color3='#88bbd4';		/* Light blue ocean */
$color4='#666';				/* Greyish bluish*/
$color5='#789';				/* Grey */
$color6='#6AC';				/* Lightish Blue*/
$color7='#39d';				/* Solid blue*/
$white='#fff';				/* White*/
$black='#000';
print <<< ENDCSS

body, html {
	background: $white;
	text-align: center;
}

#wrapper {
	margin-left:auto; 
	margin-right:auto;
	margin-bottom: none;
	padding: 0px 10px 10px 10px;
	background: $white;
	width: 70%;
	height: 100%;
	/*text-align: left;*/
}

body {
	margin:0;
	padding:0;
	color:$color5;
	/*background-color: $color1;*/
	/*background-image: url('images/front-bg.gif');*/
	/*background-repeat: repeat; font-style:normal; font-variant:normal; font-weight:normal; line-height:16px; font-size:13px; font-family:Lucida Grande, Arial, Sans-serif*/
}

#logo {
	width:100%;
}

#specialMessages {
	width:100%;
}

#specialMessages table{
	width:100%;
}

#ask {
		border: 6px solid $black;
}

#container {
	width:100%;
	margin:0 auto;
	position: relative;
}

#content {
	width:520px;
	min-height:500px;
}
a:link, a:visited {
	color:#27b;
	text-decoration:none;
}
a:hover {
	text-decoration:underline;
}
a img {
	border-width:0;
}
#topnav {
	padding:10px 0px 12px;
	font-size:11px;
	line-height:23px;
	text-align:right;
}
#topnav a.signin {
	background:#88bbd4;
	padding:4px 6px 6px;
	text-decoration:none;
	font-weight:bold;
	color:#fff;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
	*background:transparent url("images/signin-nav-bg-ie.png") no-repeat 0 0;
	*padding:4px 12px 6px;
}
#topnav a.signin:hover {
	background:#59B;
	*background:transparent url("images/signin-nav-bg-hover-ie.png") no-repeat 0 0;
	*padding:4px 12px 6px;
}
#topnav a.signin, #topnav a.signin:hover {
	*background-position:0 3px!important;
}

a.signin {
	position:relative;
	margin-left:3px;
}
a.signin span {
	background-image:url('images/toggle_down_light.png');
	background-repeat:no-repeat;
	background-position: 100% 50%;
	padding-left:0; padding-right:16px; padding-top:4px; padding-bottom:6px
}
#topnav a.menu-open {
	background:#ddeef6!important;
	color:#666!important;
	outline:none;
}
#small_signup {
	display:inline;
	float:none;
	line-height:23px;
	margin:25px 0 0;
	width:170px;
}
a.signin.menu-open span, a.register.menu-open span{
	background-image:url('images/toggle_up_dark.png');
	color:#789
}

#signin_menu, #register_menu{
	-moz-border-radius-topleft:5px;
	-moz-border-radius-bottomleft:5px;
	-moz-border-radius-bottomright:5px;
	-webkit-border-top-left-radius:5px;
	-webkit-border-bottom-left-radius:5px;
	-webkit-border-bottom-right-radius:5px;
	display:none;
	background-color:#ddeef6;
	position:absolute;
	width:210px;
	z-index:100;
	border:1px transparent;
	text-align:left;
	padding:12px;
	top: 24.5px; 
	right: 0px; 
	margin-top:5px;
	margin-right: 0px;
	*margin-right: -1px;
	color:#789;
	font-size:11px;
}

#signin_menu input[type=text], #signin_menu input[type=password], #register_menu input[type=text], #register_menu input[type=password] {
	display:block;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #ACE;
	font-size:13px;
	margin:0 0 5px;
	padding:5px;
	width:203px;
}
#signin_menu p, #register_menu p{
	margin:0;
}
#signin_menu a {
	color:#6AC;
}
#signin_menu label {
	font-weight:normal;
}
#signin_menu p.remember {
	padding:10px 0;
}
#signin_menu p.forgot, #signin_menu p.complete {
	clear:both;
	margin:5px 0;
}
#signin_menu p a {
	color:#27B!important;
}
#signin_submit {
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	background:#39d url('images/bg-btn-blue.png') repeat-x scroll 0 0;
	border:1px solid #39D;
	color:#fff;
	text-shadow:0 -1px 0 #39d;
	padding:4px 10px 5px;
	font-size:11px;
	margin:0 5px 0 0;
	font-weight:bold;
}
#signin_submit::-moz-focus-inner {
padding:0;
border:0px none;
}
#signin_submit:hover, #signin_submit:focus {
	background-position:0 -5px;
	cursor:pointer;
}

.tipsy-inner {
	padding:10px 15px;
	line-height:1.5em;
	font-weight:bold;
}
.tipsy {
	opacity:.8;
	filter:alpha(opacity=80);
	background-repeat:no-repeat;
	padding:5px;
}
.tipsy-inner {
	padding:8px 8px;
	max-width:200px;
	font:11px 'Lucida Grande', sans-serif;
	font-weight:bold;
	-moz-border-radius:4px;
	-khtml-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	background-color:#000;
	color:white;
	text-align:left;
}
.tipsy-north {
	background-image:url('images/tipsy-north.gif');
	background-position-y:center
}
.tipsy-south {
	background-image:url('images/tipsy-south.gif');
	background-position-y:center
}
.tipsy-east {
	background-image:url('images/tipsy-east.gif');
	background-position: 
               right center;
}
.tipsy-west {
	background-image:url('images/tipsy-west.gif');
	background-position: 
               left center;
}

.avatar {
	height: 80px;
	width: 80px;
}

ENDCSS;

?>