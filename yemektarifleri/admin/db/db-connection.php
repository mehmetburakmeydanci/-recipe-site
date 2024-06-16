<?php 

$ip_address = $_SERVER['REMOTE_ADDR'];
$server = "localhost";
$username = "admin";
$password = "admin";
$dbname = "yemek_tarifleri";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>