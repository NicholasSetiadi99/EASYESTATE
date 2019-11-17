<?php
	session_start();
	 
	$applicationID = $_GET["d"];
	
	$con = new mysqli("localhost", "root","","mhs");

	if(!$con)
		echo "cannot connect to the server";

	$sql = "Update application set status ='Rejected' where applicationID='{$applicationID}';";

	if ($con->query($sql) === TRUE) {
    echo "<script>
    alert('Application has been rejected.');
    window.location.href='reviewApplications.php';
    </script>";
	}
	else {
    echo "<script>
	alert('Failed to reject. ');
	window.location.href='reviewApplications.php';
	</script>";
	}
	
	$con->close();


?>