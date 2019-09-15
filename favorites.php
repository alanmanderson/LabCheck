<?php
if ($email) {
	echo "<table>";
	$query = "SELECT * FROM Favorites INNER JOIN Answers ON Favorites.AnswerID=Answers.ID WHERE Email='$email'";
	$result = mysql_query($query);
	while ($row=mysql_fetch_array($result)){
	echo "
		<tr>
			<td>$row[Answer]</td>
		</tr>";
	}
	echo "</table>";
}
?>