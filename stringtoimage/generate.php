<?php
header('Content-type: image/jpeg'); //change the content type from this funtion..

if (isset($_GET['email'])) {
	$email = $_GET['email'];	
} else {
	$email = "No email specified.";
}

$email_length = strlen($email); //getting the length of the image..

$font_size = 4; 

$image_height = imagefontheight($font_size);
$image_width  = imagefontwidth($font_size) * $email_length;

$image = imagecreate($image_width, $image_height); //creating the instance of the image..

imagecolorallocate($image, 255, 255, 255);  //background color of the image..
$font_color = imagecolorallocate($image, 0, 0, 0);

imagestring($image, $font_size, 0, 0, $email, $font_color);
imagejpeg($image);

?>

