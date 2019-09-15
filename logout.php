<?php
require_once("checkauth.php");
unset($_SESSION["user"]);
unset($_SESSION["access"]);
session_destroy();
header("Location: index.php");
?>