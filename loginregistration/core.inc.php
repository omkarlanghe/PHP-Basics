<?php 

ob_start();
session_start();

$current_file = $_SERVER['SCRIPT_NAME'];
$http_referer = $_SERVER['HTTP_REFERER']; //tell us the page we have come from..

function loggedin() {

	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
		return true;
	} else {
		return false;
	}
}

//creating a funtion to grab the values from the database depending upon the user_id...

function getuserfield($field) {

	$connect = mysqli_connect("localhost", "root", "", "adatabase");

	$query = "SELECT $field FROM users WHERE id='".$_SESSION['user_id']."'";
	
	if ($query_run = mysqli_query($connect, $query)) {

		while ($query_result = mysqli_fetch_assoc($query_run)) {
			
			return $query_result;
			
		}	
		
	}
}

?> 