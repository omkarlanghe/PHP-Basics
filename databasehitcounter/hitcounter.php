<?php

require 'connect.inc.php';
$user_ip = $_SERVER['REMOTE_ADDR'];

function ip_exists($ip) {

	global $user_ip;

	$connect = mysqli_connect("localhost", "root", "", "adatabase");
	$query = "SELECT ip FROM hits_ip WHERE ip = $user_ip";
	$query_run = mysqli_query($connect,$query);
	$query_num_rows = mysqli_num_rows($query_run);

	if ($query_num_rows==0) {
		return false;

	} else if ($query_num_rows>=1) {
		return true;
	}

}

function ip_add($ip) {

	$connect = mysqli_connect("localhost", "root", "", "adatabase");
	$query = "INSERT INTO hits_ip VALUES ('$ip')";
	@$query_run = mysqli_query($connect, $query);

}


function update_count() {
	
	$connect = mysqli_connect("localhost", "root", "", "adatabase");
	$query = "SELECT count FROM hits_count";
	
	if(@$query_run = mysqli_query($connect,$query)) {
		$count = mysqli_num_rows($query_run/*, 0, "count"*/);
		$count_inc = $count + 1;

		$query_update = "UPDATE hits_count SET count = $count_inc";
		@$query_update_run = mysqli_query($query_update);
	}
}

if (@!ip_exists($user_ip)) {
	update_count();
	ip_add($user_ip);
}

?>

<h1>My Page</h1>