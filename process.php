<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['username'] = $username;
	$con = new mysqli("localhost", "root","","sas");

	if(!$con){
		die('Failed to query database'.mysqli_error());
	}


	#Query which selects to check the username and password
	$sqlquery = " select * from user where username ='$username' and password ='$password' ";
	$result = $con->query($sqlquery);

	if ( $result->num_rows > 0) {
		echo " Login success";
		header("location:viewResidence.php");

	}
	else{
		echo " Login failed";
	}


?>
