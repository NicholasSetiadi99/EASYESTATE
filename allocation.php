<?php
	session_start();

	$applicationID = $_SESSION['applicationID'];
	$applicantID = $_SESSION['applicantID'];
	$fromDate = $_POST['fromDate'];
	$unitNo = $_POST['unitNo'];
	$duration = $_POST['duration'];

	$secord = strtotime($fromDate)+$duration*30*24*3600;
	$endDate = date('Y-m-d',$secord);
	
	$con = new mysqli("localhost", "root","","mhs");

	if(!$con)
		echo "cannot connect to the server";


	$sql = "insert into allocation values('{$unitNo}','{$fromDate}','{$duration}','{$endDate}','{$applicationID}');";
	$sql .= "Update application set status ='Approved' where applicationID='{$applicationID}';";
	$sql .= "Update application set status='Rejected' where applicantID='{$applicantID}' and applicationID!='{$applicationID}';";
	

	if ($con->multi_query($sql) === TRUE) {
		echo "Housing has been allocated successfully.";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
	
	$con->close();


?>