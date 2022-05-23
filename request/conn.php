<?php
    $servername='localhost';
	$username='u347536532_varunteja';
	$password='Nancy3690#';
	$db = "u347536532_homexrepair";
	#connecting database
	static $conn;
	if ($conn==NULL){ 
	$conn=new mysqli($servername, $username, $password, $db); 
	}
	return $conn;
?>
