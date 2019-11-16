<?php

$servername = "localhost";
$usernameDB = "root";
$password = "";

// Create connection
$con = new mysqli($servername, $usernameDB, $password);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// There can be many data bases on the server, so we need to specify which
// database we want to use
/* Assuming we already have created a database named "sas" ; select db  */
$con->select_db("mhs");

// In order to insert/query/update date , we should have a table
// Assume we already have table named "user"
// We will store the user details provided in signup page and store in user
// table of our database

$user = $_POST['username'];
$pass= $_POST['password'];
$fullname= $_POST['fullname'];
$em= $_POST['email'];
$income = $_POST['monthlyIncome'];
$randomID = uniqid();


$sql = "INSERT INTO user(password,fullname,username) VALUES ('{$pass}','{$fullname}','{$user}');";
$sql .= "INSERT INTO applicant(applicantID,monthlyIncome,email,username) VALUES ('{$randomID}','{$income}','{$em}','{$user}')";

// Execute multi query
if ($con->multi_query($sql) === TRUE) {
    echo "New applicant is created successfully";
    header("applicantLogin.html");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();



?>
