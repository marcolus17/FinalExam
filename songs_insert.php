<!--
	songs_insert.php
	Author: Nick Markworth
	Insert the favorite song into a MySQL database
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Final Exam | Insert Song </title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
		<h2> Your Favorite Songs </h2>

		<?php
			# Get form values
			$songName = $_POST['songName']; 
			$artist = $_POST['artist'];
			$composer = $_POST['composer'];
	
			$flag = true;
  
			# Make sure values are not empty
			if (empty($songName)) {
				echo '<p class="error"> Song name must be filled in. </p>';
				$flag = false;
			}
			if (empty($artist)) {
				echo '<p class="error"> Artist must be filled in. </p>';
				$flag = false;
			}
			if (empty($composer)) {
				echo '<p class="error"> Composer must be filled in. </p>';
				$flag = false;
			}
  
			# Submit data to DB if values are not empty
			if ($flag) {
				# Connect to DB
				$dbc = new mysqli("localhost", "root", "root", "FinalExam");
				
				# Check DB connection
				if ($dbc->connect_error) {
					die('Error connecting to MySQL Database: ' . $dbc->connect_error);
				}
 
				$query = "INSERT INTO db_songs (SONG_NAME, ARTIST, COMPOSER)" .
				"VALUES ('$songName', '$artist', '$composer')";
 
 				# Verify the query finished successfully
				if ($dbc->query($query) === TRUE) {
					# Give user feedback
					echo '<p> Thanks for submitting the form. </p>';
					echo '<p> Song Name: ' . $songName . '<br />';
					echo 'Artist: ' . $artist . '<br />';
					echo 'Composer: ' . $composer . '</p>'; 
				}
				else {
					die('Error inserting the data.');
				}
				
				# Close the connection
				$dbc->close();
			}
		?>
		
		<p> <a id="return" href="songs.html"> Enter another song </a> </p>
		<p> <a id="list" href="songs_list.php"> Go to list of songs </a> </p>
	</body>
</html>
