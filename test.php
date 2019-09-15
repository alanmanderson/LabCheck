<?php
	echo $_POST["test"];
	echo $_GET["var"];
	echo $_GET["var2"];
?>
<html>
<head>
</head>
<body>
	<form action="test.php?var=5&var2=6" method="POST">
		<input type="text" name="test" value="monkey"/>
		<input type="submit" value="submit"/>
	</form>
</body>