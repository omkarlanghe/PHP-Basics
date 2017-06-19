<?php
require 'connect.inc.php';
?>

<form action="database.php" method="GET">
	Choose food type:
	<select name="uh">
		<option value="u">Unhealthy</option>
		<option value="h">Healthy</option>
	</select><br><br>
	<input type="submit" name="Submit">
</form>

<?php

if(isset($_GET['uh'])&&!empty($_GET['uh'])) {

	$uh = strtolower($_GET['uh']);

	if ($uh == 'u' || $uh == 'h') {

		$connect = mysqli_connect("localhost", "root", "", "adatabase"); //connecting to mysql database..
		$query =  "SELECT food, calories FROM food WHERE healthy_unhealthy ='$uh' ORDER BY id DESC"; //fetching query from the database..
		//$query_run = mysql_query($query);

		if ($query_run = mysqli_query($connect, $query)) {
			
			if (mysqli_num_rows($query_run)==NULL) {
			
				echo 'No results found.';
			
			} else {

			while ($query_row = mysqli_fetch_assoc($query_run)) {
				
				$food = $query_row['food'];
				$calories = $query_row['calories'];

				echo $food.' has '.$calories.' calories.<br>';
				}
			}

			} else {
				echo mysqli_error($connect);
			}
	}
}
?>

