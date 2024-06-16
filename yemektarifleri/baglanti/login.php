<?php 
session_start();
require ("../database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = trim($_POST["kullanici_adi"]);
    $sifre = trim($_POST["sifre"]);
    $stmt = $conn ->prepare("SELECT uye_id, kullanici_adi, sifre FROM uyeler WHERE kullanici_adi=?");
    $stmt->bind_param("s", $kullanici_adi);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows == 1){
        $stmt->bind_result($uye_id, $kullanici_adi, $saklanan_sifre);
        $stmt->fetch();
            if($sifre == $saklanan_sifre){
                $_SESSION["uye_id"] = $uye_id;
                $_SESSION["kullanici_adi"] = $kullanici_adi; 
                header("Location: ../");
                exit();
            } else {
                header("Location: ../giris.php?error=hatali-bilgiler");
                exit();
            }
    }else{
        header("Location: ../giris.php?error=kullaniciyok");
        exit();
    }
    $stmt->close();
} 
$conn->close();
?>