<?php 
if (isset($_SESSION["uye_id"])) {

    $uye_id = $_SESSION['uye_id'];
    include ("database.php");
    $sql = "SELECT * FROM uyeler where uye_id=$uye_id";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $uye_id = $row['uye_id'];
        $ad = $row['ad'];
        $soyad = $row['soyad'];
        $kullanici_adi = $row['kullanici_adi'];
    }
}
?>