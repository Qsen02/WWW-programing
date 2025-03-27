<?php
$server = "localhost";
$username = "root";
$password = "";
$dbName = "conferences";
if (!$dbConnection = mysqli_connect($server, $username, $password, $dbName)) {
	die("Could not connect to server");
}
?>