<?php
	session_start();
	$username = $_SESSION['username'];
	$residenceID = $_SESSION['residenceID'];
  $randomApplicationID = uniqid();

  $dateRequired = $_POST["dateRequired"];




	$con = new mysqli("localhost", "root","","mhs");


	$query = "select applicantID from applicant,user where user.username=applicant.username and user.username='{$username}'";
	$applicantResult = $con->query($query);
	$attr = $applicantResult->fetch_array();
	$applicantID = $attr["applicantID"];



	#Query which creates a new application
	$sql = "insert into application(applicationID,applicationDate,requiredMonth,status,applicantID,residenceID) values('{$randomApplicationID}', CURRENT_DATE, '{$dateRequired}', 'NEW','{$applicantID}','{$residenceID}')";
	$result=$con->query($sql);


	if($result)
	{
    echo "<script>
    alert('Application Submitted Successfully');
    window.location.href='viewResidence.php';
    </script>";

	}
	else
	{
    echo "<script>
    alert('Application Submitted Successfully');
    window.location.href='selectPeriod.php';
    </script>";
	}
?>
