<?php
session_start();
header("Cache-control: private");
if ($_SESSION["access"] != "granted") {
  //header("Location: ./login.php?referrer=".$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']);
} else {
  $username=$_SESSION["user"];
	$email = $_SESSION["email"];
	$userType= $_SESSION["type"];
}
?>