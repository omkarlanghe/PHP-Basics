<?php
require 'core.inc.php';

if (!loggedin()) {

	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_again = $_POST['password_again'];
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];

		if (!empty($username) && !empty($password) && !empty($password_again) &&!empty($firstname) && !empty($surname)) {
			
			if($password!=$password_again) {
				echo 'no matched';
			} else {

				

			}

		} else {
		
			echo 'All fields are required.';
		
		}
	}

?>

<form action="register.php" method="POST">
	Username:<br> <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
	Password:<br> <input type="password" name="password"><br><br>
	Password again:<br> <input type="password" name="password_again"><br><br>
	Firstname:<br> <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
	Surname:<br><input type="text" name="surname" value="<?php echo $surname; ?>"><br><br>
<input type="submit" name="Register">
</form>

<?php
} else if (loggedin()) {
	echo 'You are already registered.';
}

?>