<!--
	songs_update.php
	Author: Nick Markworth
	Update a favorite song in a MySQL database
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Final Exam | Update Song </title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
		<h2> Your Favorite Songs </h2>

		<?php
			$originalSongName = 'I hate exams';
  			$updatedSongName = 'I love exams';
  			$artist = 'Mary Jane';
  			
			# Connect to DB
			$dbc = new mysqli("localhost", "root", "root", "FinalExam");
			
			# Check DB connection
			if ($dbc->connect_error) {
				die('Error connecting to MySQL Database: ' . $dbc->connect_error);
			}

			$query = "UPDATE db_songs SET SONG_NAME = '$updatedSongName' WHERE ARTIST = '$artist'";

			# Verify the query finished successfully
			if ($dbc->query($query) === TRUE) {
				# Give user feedback
				echo '<p> Your song has been updated successfully. </p>';
				echo '<p> Original Song Name: ' . $originalSongName . '<br />';
				echo 'Updated Song Name: ' . $updatedSongName . '<br />';
				echo 'Artist: ' . $artist . '</p>'; 
			}
			else {
				die('Error updating the data.');
			}
			
			# Close the connection
			$dbc->close();
		?>
	</body>
</html>
