<?php
	include_once("checkauth.php");
	include_once("dbconnect.php");
	$question = htmlentities($_POST['ask'],ENT_QUOTES);
	$postedBy = 'User 456';
	if (isset($username)){
		$postedBy = $_SESSION['email'];		
	}
	$query = "INSERT INTO Questions (Question, PostedBy) VALUES('$question', '$postedBy')";
	echo $query;
	$result = mysql_query($query) or die(mysql_error());
	$result = mysql_query("SELECT LAST_INSERT_ID() as newID");
	$row = mysql_fetch_array($result);
	$id = $row['newID'];
	echo $id;
	if ($id){
		header("Location: question.php?id=$id");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<script type="text/javascript">		
	</script>
	</head>
	<body>
		<form id="askForm">
			
			<input type="submit" id="submit" value="Lab check it!"/>
		</form>
	</body>
</html>