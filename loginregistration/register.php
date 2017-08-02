			<?php
			require 'core.inc.php';

			if (!loggedin()) {

				if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['surname'])) {
					
					$username = $_POST['username'];
					$password = $_POST['password'];
					$password_again = $_POST['password_again'];
					$password_hash = md5($password);
					$firstname = $_POST['firstname'];
					$surname = $_POST['surname'];

					if (!empty($username) && !empty($password) && !empty($password_again) &&!empty($firstname) && !empty($surname)) {

						$connect = mysqli_connect("localhost", "root", "", "adatabase");
						if($password!=$password_again) {
							echo 'no matched';
						} else {
						
						$connect = mysqli_connect("localhost", "root", "", "adatabase");
						$query = "SELECT username FROM users WHERE username=$username";
						$query_run = mysqli_query($connect, $query);

						if(mysqli_num_rows($query_run)==1) {

							echo 'The username'.$username.'already exists.';

						} else {
							$query = "INSERT INTO users VALUES ('','".mysqli_real_escape_string($connect, $username)."','".mysqli_real_escape_string($connect, $password_hash)."','".mysqli_real_escape_string($connect, $firstname)."','".mysqli_real_escape_string($connect, $surname)."')";

							if ($query_run = mysqli_query($connect, $query)) {
								header('Location: registersuccess.php');
							} else {
								echo 'Sorry, we could not register you at this time. Try again.';
							}
						}

						}

					} else {
					
						echo 'All fields are required.';
					
					}
				}

			?>

			<form action="register.php" method="POST">
				Username:<br> <input type="text" name="username" value="<?php if (isset($username)) {echo $username; } ?>"><br><br>
				Password:<br> <input type="password" name="password"><br><br>
				Password again:<br> <input type="password" name="password_again"><br><br>
				Firstname:<br> <input type="text" name="firstname" value="<?php if(isset($firstname)) { echo $firstname; } ?>"><br><br>
				Surname:<br><input type="text" name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>"><br><br>
			<input type="submit" name="Register">
			</form>

			<?php
			} else if (loggedin()) {
				echo 'You are already registered.';
			}

			?>