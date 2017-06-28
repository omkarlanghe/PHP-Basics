<?php

$mysql_error = 'could not connect';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_db = 'adatabase';

if (!@mysqli_connect($mysql_host, $mysql_user, $mysql_password)||
	!@ mysqli_select_db($mysql_db)) {
	
} else {

	die($mysql_error);
}

?>