<?php 

	 if (isset($_GET['day'])&&isset($_GET['date'])&&isset($_GET['year'])) {
		//variables declared		 
		 $day = htmlentities($_GET['day']);
		 $date = htmlentities($_GET['date']);
		 $year = htmlentities($_GET['year']);

		if(!empty($day)&&!empty($date)&&!empty($year)) {
			//prints dat,date and year by concatinating...
			echo 'It is '.$day.' '.$date.' '.$year;
		
		} else {

			echo 'Fill in all fields';
		}		 
			

	}
	
?>

<form action="workingwithGETVar.php" method="GET">
	
	Day:<br><input type="text" name="day"><br>
	Date:<br><input type="text" name="date"><br>
	Year:<br><input type="text" name="year"><br><br>

	<input type="submit" name="Submit">

</form>