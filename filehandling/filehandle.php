<?php

if (isset($_POST['name'])) {
	
	$name = $_POST['name'];
	
	if (!empty($name)) {
		
		$handle = fopen('names.txt','a');
		fwrite($handle, $name."\n");
		fclose($handle);

		echo 'Current names in file: ';

		$count = 1;
		$readin = file('names.txt');
		$readin_count = count($readin);
		
		foreach ($readin as $fname) {

			//trim() function removes the whitespace
			echo trim($fname);
			if ($count<$readin_count) {
				echo ', ';	

				$count++;
			} 
		}

	} else {
		
		echo 'Please type a name.';
	
	}
}

?>

<form action="filehandle.php" method="POST">
	Name:<br>
	<input type="name" name="name"><br><br>
	<input type="submit" name="submit">
</form>