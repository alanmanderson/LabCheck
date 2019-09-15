<?php
	include_once("dbconnect.php");
	include_once("checkauth.php");
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
			<!--<form id="login" action="login.php" method="POST">
				/*
				?php
					session_start();
					header("Cache-control: private");
					if ($_SESSION["access"] == "granted") {
						$username = $_SESSION["user"];
						$email = $_SESSION["email"];
						echo "Hello $username | <a href=\"logout.php\">logout</a>";
					} else {
						echo
						'<a href="register.php">Register</a> | <label for="email">Email: </label><input type="text" name="email"/>
																									<label for="password">Password: </label><input type="password" name="password"/>
																									<span onclick="document.forms[\'login\'].submit()" style="text-decoration:underline; cursor: pointer;">login</span></br>
																									<input type="hidden" name="referrer" value="index.php"/>';
					}*/
				?>
			</form>-->
			<div id="logo">
				<img src="images/logo_small.png"></img>
			</div>
			<form id="mainForm" method="post" action="ask.php">
				<!--<input type="text" name="ask" id="ask"/><br/>-->
				<p><textarea name="ask" id="ask" rows="3" cols="50"></textarea>
				<p><input type="button" id="search" value="-- Search --" onclick="alert('feature coming soon!')"/>
				<input type="submit" id="submit" value="-Ask the Pros-"/>
			</form>
			<div id="specialMessages">
				<table>
					<tr>
						<td width="50%">
							<table>
							<?php
								if ($email){							
									$query="SELECT * FROM Questions WHERE PostedBy='$email'";
									$result = mysql_query($query) or die(mysql_error());
									while($row=mysql_fetch_array($result)){
										echo "<tr>
														<td><a href=\"question.php?id=$row[ID]\">$row[Question]</a></td>
													</tr>";
									}
								}
							?>
							</table>
						</td>
						<td width="50%">
							<?php include_once("favorites.php"); ?>
						</td>
			</div> <!-- End Special Messages -->
		</div> <!-- End Wrapper -->
	</body>
</html>