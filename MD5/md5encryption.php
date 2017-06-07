<?php

	/*$string = 'password';
	$string_hash = md5($string);

	echo $string_hash;
	*/

	if (isset($_POST['user_password'])&&!empty($_POST['user_password'])) {

		$user_password = md5($_POST['user_password']);  //md5() function is an encryption algo which converts the string value to hash..
		$filename = 'md5.txt'; 
		
		$handle = fopen($filename, 'r'); //reading a file md5.txt from variable filename
		$file_password = fread($handle, filesize($filename));  //reads the hash value from the file md5.txt..

		//comparing the hash value with password and if matched proceed further else incorrect password..
		if($user_password==$file_password){  
	
			echo 'password ok';
	
		} else {
	
			echo 'incorrect password';
	
		}
	
	} else {
	
		echo 'please enter the password';
	
	} 

?>

<form action="md5encryption.php" method="POST">
	Password: <input type="password" name="user_password"><br><br>
	<input type="submit" value="submit">
	
</form>