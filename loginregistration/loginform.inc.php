<?php

if (isset($_POST['username'])&&isset($_POST['password'])) {
	
	$username = $_POST['username'];
	$Password = $_POST['password'];
	$password_hash = md5($Password);
	

	if (!empty($username)&&!empty($Password)) {
	
	$connect = mysqli_connect("localhost", "root", "", "adatabase");

	$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password_hash'";

		if ($query_run = mysqli_query($connect, $query)) {
			
			$query_num_rows = mysqli_num_rows($query_run);
			
			if ($query_num_rows = 0) {
					
					echo 'Invalid username/password combination.';
			
				} else if($query_num_rows = 1) {
					
					$user_id = mysqli_num_rows($query_run);
					$_SESSION['user_id'] = $user_id;
					header('Location: home.php');


					
				}	
		}

	} else {
		
		echo 'You must supply a username and password.';
	
	}
}

?>

<form action="<?php echo  $current_file; ?>" method="POST">
	Username: <input type="text" name="username">
	Password: <input type="password" name="password">
	<input type="submit" name="Log in">
</form>