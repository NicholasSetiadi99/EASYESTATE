<?php

	$con = new mysqli("localhost", "root","","mhs");

	if(!$con){
		die('Failed to query database'.mysqli_error());
	}
?>
