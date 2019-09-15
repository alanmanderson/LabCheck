<?php
	include_once('dbconnect.php');
	include_once('checkauth.php');
	$questionID = htmlspecialchars($_GET['id']);
	$action = htmlspecialchars($_GET['action']);
	$query = "SELECT * from Questions WHERE ID=$questionID";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$question = html_entity_decode($row['Question'],ENT_QUOTES);
	$date = $row['PostedDate'];
	$by = $row['PostedBy'];
	$resolved = ($row['Resolved']? true:false);
	if($action=="follow" && $email){
		$query="INSERT INTO Follow (Email, QuestionID) VALUES ('$email',$questionID)";
		mysql_query($query) or die(mysql_error());
	} else if($action=="stopFollow"){
		$query="DELETE FROM Follow WHERE Email='$email' AND QuestionID=$questionID";
		mysql_query($query) or die(mysql_error());
	} else if($action=="answer"){
		$answer = htmlentities($_POST['myAnswer'],ENT_QUOTES);
		$query="INSERT INTO Answers (QuestionID,Answer,PostedBy) VALUES ($questionID,'$answer','$email')";
		mysql_query($query) or die(mysql_error());
	} else if ($action=="favorite"){
		$answerID = htmlspecialchars($_GET['answerID']);
		$query="INSERT INTO Favorites (AnswerID, Email) VALUES ($answerID, '$email')";
		$result = mysql_query($query) or die(mysql_error());
	}
	if(!$resolved && $action=="resolve" && $username==$by){
		$query="UPDATE Questions SET Resolved=1 where ID=$questionID";
		$result = mysql_query($query) or die(mysql_error());
		$resolved = true;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<style type="text/css">
			@import 'stylesheets/css.php?c=demo.css';
		</style>
		<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
		<script type="text/javascript">		
		</script>
	</head>
	<body>
		<div id="wrapper">
			<?php 
				include_once("regBar.php");
				include_once('navBar.php');
			?>
			<form id="questionForm">
				<table border="2px">
					<tr>
						<td colspan ="3" style="padding: 0px 5px 0px 5px;">
							<?php	echo $question; ?>
						</td>
					</tr>
					<?php
						if ($username){
							echo "<tr>
											<td>";
							$query = "SELECT * FROM Follow where Email='$email' and QuestionID=$questionID";
							$result=mysql_query($query) or die(mysql_error());
							if(mysql_num_rows($result)>0){ 
								echo "<a href=\"question.php?id=$questionID&action=stopFollow\">Stop Following</a>"; 
							}	else { 
								echo "<a href=\"question.php?id=$questionID&action=follow\">Follow</a>"; 
							}
							echo		"</td>
											<td>";
							if ($username==$by){
								echo 		"<a>Edit</a></td>
												<td>";
								if (!$resolved){
									echo "<a href=\"question.php?id=$questionID&action=resolve\">Mark Resolved</a>";
								}
								echo 		"</td>
											</tr>";
							} else{
								echo "</td><td></td>
										</tr>";
							}
						}
					?>
					<tr>
						<td style="padding: 0px 5px 0px 5px;"><?php echo $date ?></td>
						<td style="padding: 0px 5px 0px 5px;"><?php echo $by ?></td>
						<td style="padding: 0px 5px 0px 5px;"><?php echo ($resolved?"Resolved": "Not yet Resolved") ?></td>
				</table>
			</form>
				
			<?php
				if ($userType=="Professional"){
					echo '<form action="question.php?id='.$questionID.'&action=answer" method="POST">
									<table border="1px">
										<tr>
											<td>
												<label for="myAnswer">Your answer: </label>
												<Input type="text" name="myAnswer"\><br/>
												<input type="submit" value="Answer"\>
											</td>
										</tr>
									</table>
								</form>';
				}
			?>
			
			<table border="1px">
			<?
				$query = "SELECT *, Answers.ID AS aid FROM Answers JOIN Users ON Answers.PostedBy=Users.Email WHERE QuestionID=$questionID ORDER BY PostedDate";
				$result = mysql_query($query) or die(mysql_error());
				while($row=mysql_fetch_array($result)){
					$answerID = $row['aid'];
					$answer = html_entity_decode($row['Answer'],ENT_QUOTES);
					$by = $row['First'];
					$icon = $row['Icon'];
					if(!$icon) {$icon="anon.png";}
					$votesFor = $row['VotesFor'];
					$votesAgainst = $row['VotesAgainst'];
print <<< END
				<tr>
					<td>
						<img src="images/$icon" class="avatar"></img><br/>
						$by
					<td>
					</td>
					<td>
						<table>
							<tr>
								<td colspan = "5">$answer</td>
							</tr>
							<tr>
								<td> $date</td><td><a href="">Correct</a></td><td><a href="">Incorrect</a></td><td>In favor: $votesFor</td><td> Against: $votesAgainst</td>
							</tr>
							<tr>
								<td colspan = "5"><a href="question.php?id=$questionID&action=favorite&answerID=$answerID">Favorite</a></td>
							</tr>
						</table>
					</td>
				</tr>
END;
				}
			?>
			</table>
		</div>
	</body>
</html>