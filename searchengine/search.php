<?php

require 'connect.inc.php';

	if (isset($_POST['search_name'])) {
		$search_name = $_POST['search_name'];
		if (!empty($search_name)) {
			
			if (strlen($search_name)>=4) {

			//if true execute this condition below..	
			$connect = mysqli_connect("localhost", "root", "", "adatabase");
			$query = "SELECT name FROM names WHERE name LIKE '%".mysqli_real_escape_string($connect, $search_name)."%' ";

			$query_run = mysqli_query($connect, $query);

			$query_num_rows = mysqli_num_rows($query_run);
			
			if ($query_num_rows>=1) {
				
				echo $query_num_rows.' result found:<br>';

				//grabing the data in the associative array and putting it inside query_row
				while ($query_row = mysqli_fetch_assoc($query_run)) {
					echo $query_row['name'].'<br>';
				}

			} else {

				echo 'No results found.';
			}

		} else {
			echo 'Your keyword must be 5 characters or more.';
		}

		}
	}
	
?>

<form action="search.php" method="POST">

	Name: <input type="text" name="search_name">
		  <input type="submit" name="Search">

</form>