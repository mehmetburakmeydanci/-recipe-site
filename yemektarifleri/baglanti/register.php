<?php 
require("../database.php");
session_start();

$ad = $_POST["ad"];
$soyad = $_POST["soyad"];
$kullanici_adi = $_POST["kullanici_adi"];
$sifre = $_POST["sifre"];

$uye_id = random_int(100000, 999999);

$sql = "INSERT INTO uyeler (uye_id, ad, soyad, kullanici_adi, sifre) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $uye_id, $ad, $soyad, $kullanici_adi, $sifre); 

if ($stmt->execute()) {
    $_SESSION["uye_id"] = $uye_id; // uye_id'yi oturumda sakla
    $_SESSION["kullanici_adi"] = $kullanici_adi; // kullanici_adi'ni oturumda sakla

    // Dolaplar tablosuna eklerken aynı uye_id'yi kullan
    $dolap_id = random_int(100000, 999999);
    $sql2 = "INSERT INTO dolaplar (uye_id, dolap_id, kullanici_adi) VALUES (?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("iis", $uye_id, $dolap_id, $kullanici_adi); 

    if ($stmt2->execute()) {
        header("Location: ../");
    } else {
        echo "Dolap Kaydı Başarısız: " . $conn->error;
    }
} else {
    echo "Kullanıcı Kaydı Başarısız: " . $conn->error;
}

$stmt->close();
$stmt2->close();
$conn->close();

?>