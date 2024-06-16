<?php 
include ("database.php");

$sql = "SELECT * FROM tema_ayarlari";
$result = $conn->query($sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $logo = $row['logo'];
    $site_adi = $row['site_adi'];
    $slogan = $row['slogan'];
    $intro_gorsel = $row['intro_gorsel'];
}
?>