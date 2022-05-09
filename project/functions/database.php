<?php
ini_set('display_errors', 'off');
$hostname = "localhost";
$username = "root";
$password = "";
$database = "topshop";
$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
	exit("Database connection error");
}
?>