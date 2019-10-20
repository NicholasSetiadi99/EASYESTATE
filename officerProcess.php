<?php
	session_start();
	$_SESSION["username"] = $_POST['username'];

	$username = $_POST['username'];
	$password = $_POST['password'];


	$con = new mysqli("localhost", "root","","sas");

	if(!$con)
		echo "cannot connect to the server";


	$sqlquery = " select * from user where username ='$username' and password ='$password' ";
	$result = $con->query($sqlquery);

	if ( $result->num_rows > 0) {
		echo " Login success";
		header("location: housingOfficerPage.php");
		/*while ($row  = $result-> fetch_assoc()){
			echo " name = " . $row['name'] . " pass " . $row['password'];
		}*/
	}
	else{
		echo " Login failed";
	}
	//$result = mysql_query("select * from user where username = '$username' and password = '$password'")
			//or die ("Failed to query database".mysql_error());
	/*$row = mysql_fetch_array($result);

	if ($row['username'] == $username && $row ['password'] == $password ){
		echo "Login success";
	}
	else{
		echo "Failed to login";
	}*/


?>
