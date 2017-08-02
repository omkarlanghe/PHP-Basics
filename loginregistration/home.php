<?php
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin()) {
	
	$firstname = getuserfield('firstname');
	$surname = getuserfield('surname');

	echo 'You are logged in, '.$firstname.' '.$surname.' <a href="logoutform.php">Log out</a><br>';

} else {

	include 'loginform.inc.php';

}

/*
aaa aaa ccc aaa ccc bbb

aaa aaa aaa
ccc ccc
bbb

*/

?>

