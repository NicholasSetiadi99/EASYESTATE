<?php
	session_start();
	 
	$applicationID = $_GET["d"];
	
	$con = new mysqli("localhost", "root","","mhs");

	if(!$con)
		echo "cannot connect to the server";

	$sql = "Update application set status ='Rejected' where applicationID='{$applicationID}';";

	if ($con->query($sql) === TRUE) {
    echo "This application has been rejected.";
	}
	else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();


?>