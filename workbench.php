<?php
	include_once("dbconnect.php");
	include_once("checkauth.php");
	echo $email;
	if (!$email){
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
		<style type="text/css">
			@import 'stylesheets/css.php?c=demo.css';
		</style>
		<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
		<script src="javascripts/jquery.js" type="text/javascript"></script>
		<!--<LINK rel="stylesheet" href="stylesheets/login.css"></LINK>-->
	</head>
	<body>
		<div id="wrapper">
			<?php include_once("regBar.php")?>
		</div> <!-- wrapper -->
	</body>
</html>