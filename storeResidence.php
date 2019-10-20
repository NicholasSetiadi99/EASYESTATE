<?php
	session_start();

	$staffID=$_SESSION['staffID'];
	$residenceID = $_POST['residenceID'];
	$address = $_POST['address'];
	$numofunits = $_POST['availableUnits'];
	$unitsize = $_POST['unitSize'];
	$monthlyrental = $_POST['monthlyRental'];


	$con = new mysqli("localhost", "root","","mhs");

	if(!$con)
		echo "cannot connect to the server";


	$sql = " insert into residence (residenceID, address, numUnits, sizePerUnit, monthlyRental,staffID)
	values ('{$residenceID}','{$address}','{$numofunits}','{$unitsize}','{$monthlyrental}','{$staffID}') ";

	if ($con->query($sql) === TRUE) {
    echo "Programme added successfuly";
	}
	else {
    echo "Error: " . $sql . "<br>" . $con->error;
	}
	$con->close();


?>
