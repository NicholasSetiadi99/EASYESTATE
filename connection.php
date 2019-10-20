<?php

	$con = new mysqli("localhost", "root","","sas");
	
	if(!$con){
		die('Failed to query database'.mysqli_error());
	}
?>