<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin()) {
	
	echo 'You are logged in.';

} else {

	include 'loginform.inc.php';

}


?>