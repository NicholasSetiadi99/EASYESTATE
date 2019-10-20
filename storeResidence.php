<?php
	
	$programmename = $_POST['programmename'];
	$closingdate = $_POST['closingdate'];
	$description = $_POST['description'];

	$con = new mysqli("localhost", "root","","sas");
	
	if(!$con)
		echo "cannot connect to the server"; 

	
	$sql = " insert into programme (programmeID, programmename, description, closingdate, facultyID) 
	values ('P011','{$programmename}','{$description}','{$closingdate}','F001') "; 
	
	if ($con->query($sql) === TRUE) {
    echo "Programme added successfuly";
	} 
	else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();


?>