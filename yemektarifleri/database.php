<?php 
$ip_address = $_SERVER['REMOTE_ADDR'];
$server = "localhost";
$username = "admin";
$password = "admin";
$dbname = "yemek_tarifleri";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
} 
?>

