<!--
	songs_list.php
	Author: Nick Markworth
	List the songs that are in the database
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Final Exam | Songs List </title>
		<link rel="stylesheet" type="text/css" href="main.css" />
	</head>
	<body>
		<h2> Your Favorite Songs </h2>
		<?php	
			# Connect to DB
			$dbc = new mysqli("localhost", "root", "root", "FinalExam");
	
			# Check DB connection
			if ($dbc->connect_error) {
				die('Error connecting to MySQL Database: ' . $dbc->connect_error);
			}

			$query = "SELECT * FROM db_songs";
			
			# Add a sorting method to the query
			if ($_GET['sort'] == 'name') {
				$query .= " ORDER BY SONG_NAME";
			} 
			else if ($_GET['sort'] == 'artist') {
				$query .= " ORDER BY ARTIST";
			} 
			else if ($_GET['sort'] == 'composer') {
				$query .= " ORDER BY COMPOSER";
			} 
			else {
				$query .= " ORDER BY id";
			}
			
			# Verify the query finished successfully
			if ($result = $dbc->query($query)) {
				# Make sure there are songs listed in the db
				if ($result->num_rows > 0) {
					# Output how many records were found
					if ($result->num_rows == 1) {
						echo '<p>' . $result->num_rows . ' result </p>';
					}
					else {
						echo '<p>' . $result->num_rows . ' results </p>';
					}
					# Show results in a table
					echo "<table>";
					echo "<tr>";
					# Add links to allow for sorting
					echo '<th> <a href="songs_list.php?sort=id"> ID </a> </th>';
					echo '<th> <a href="songs_list.php?sort=name"> Song Name </a> </th>';
					echo '<th> <a href="songs_list.php?sort=artist"> Artist </a> </th>';
					echo '<th> <a href="songs_list.php?sort=composer"> Composer </a> </th>';
					echo "</tr>";
					# Display song records
					$even = 0;
					while($row = $result->fetch_assoc()) {
						if ($even == 1) {
							echo '<tr class="even"><td>' . $row["id"]. "</td><td>" . $row["SONG_NAME"]. "</td><td>" . $row["ARTIST"]. "</td><td>" . $row["COMPOSER"] . "</td></tr>";
							$even--;
						}
						else {
							echo "<tr><td>" . $row["id"]. "</td><td>" . $row["SONG_NAME"]. "</td><td>" . $row["ARTIST"]. "</td><td>" . $row["COMPOSER"] . "</td></tr>";
							$even++;
						}
					}
					echo "</table>";
					echo '<br />';
				} 
				else {
					echo '<p class="error"> 0 results </p>';
				}
				
				# Free the result set
				$result->close();
			}
			else {
				die('Error submitting the query.');
			}

			# Close the connection
			$dbc->close();
		?>
		
		<a id="return" href="songs.html"> Enter another song </a>
	</body>
</html>