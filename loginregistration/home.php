<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin()) {
	
	echo 'You are logged in. <a href="logoutform.php">Log out</a>';

} else {

	include 'loginform.inc.php';

}


?>