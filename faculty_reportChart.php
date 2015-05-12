<?php
    include_once('./connection.php'); 
	//fetching main information
	if ($conn->connect_error) { //Check connection
		die("Connection failed: " . $conn->connect_error);
 	}
	
	function printPie($element,$faculty_id)
	{
	global $conn;
	 echo "hi ".$faculty_id;
	 }
	
?>