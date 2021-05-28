<?php
//connecting to database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact";
//creat a connection
$conn = mysqli_connect($servername, $username, $password, $database);
//Condition if database connection is success or not
if (!$conn) {
    die("Fail to connect :" . mysqli_connect_error());
}
?>