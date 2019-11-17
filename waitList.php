<?php
	session_start();
	 
	$applicationID = $_GET["d"];
	
	$con = new mysqli("localhost", "root","","mhs");

	if(!$con)
		echo "cannot connect to the server";

	$sql = "Update application set status ='Wait List' where applicationID='{$applicationID}';";

	if ($con->query($sql) === TRUE) {
    echo "This application has been put in the wait list.";
	}
	else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();


?>