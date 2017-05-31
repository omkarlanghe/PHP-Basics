<?php

$offset = 0;

if (isset($_POST['text'])&&isset($_POST['searchfor'])&&isset($_POST['replacewith'])) {

	 $text = $_POST['text'];
	 $search = $_POST['searchfor'];
	 $replace = $_POST['replacewith'];
	 $text = strtolower($text);
	 $search_length = strlen($search);


	 //Checks whether all the fields are full or not
	 if(!empty($text)&&!empty($search)&&!empty($replace)){
	 	
	 	//Inside while loop strpos will return the offset or the location of the specific string where it is
	 	while($strpos = strpos($text, $search, $offset)) {
	 			
	 			 $offset = $strpos + $search_length;
	 			 $text = substr_replace($text, $replace, $strpos, 
	 			 	$search_length);

	 	}

	 	echo $text;

	 } else {

	 	echo 'Please fill in all the fields.';
	 
	 }
}

?>

<title>FIND AND REPLACE APPLICATION</title>
<h1>FIND AND REPLACE APPLICATION</h1>
<form action="Find&ReplaceApplication.php" method="POST">

	<textarea name="text" rows="10" cols="100"></textarea><br><br>
		
		Search for:<br>
		<input type="text" name="searchfor"><br><br>
		
		Replace with:<br>
		<input type="text" name="replacewith"><br><br>
	
	<input type="submit" value="Find and Replace">
</form>