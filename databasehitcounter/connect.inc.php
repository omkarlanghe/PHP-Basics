<?php

$conn_error = 'could not connect';

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';

$mysql_db   = 'adatabase';

if (!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) ||
	!@mysqli_select_db($mysql_db)) {
	
	//echo 'connected';
	
	} else {
	die($conn_error);
	}


?>