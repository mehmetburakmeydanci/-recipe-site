<?php 
if ( isset($_GET["uye_id"]) ) {
    $uye_id = $_GET["uye_id"];

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $server = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "yemek_tarifleri";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    $sql = "DELETE FROM uyeler WHERE uye_id = $uye_id";
    $conn->query($sql);

}
header("Location: users.php?deleted=true");
exit();
?>