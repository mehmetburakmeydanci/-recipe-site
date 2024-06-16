<?php 
session_start();
require("database.php");
include("tema_baglanti.php");




 if(isset($_GET['uye_id'])) {
    $uye_id = $_GET['uye_id'];

    if (($_GET['uye_id'])==($_SESSION["uye_id"])) {

        $sql = "SELECT * FROM uyeler WHERE uye_id='$uye_id'";
        $result = $conn->query($sql);
    
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $uye_id = $row['uye_id'];
            $ad = $row['ad'];
            $soyad = $row['soyad'];
            $kullanici_adi = $row['kullanici_adi'];
        }
       
    } else {
        header("Location: giris.php");
    }



 }

 


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=-, initial-scale=1.0">
    
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />

    <title>Document</title>
</head>
<body>
    <?php require("header.php"); ?>
    <div class="containerx">
        <div class="user-card">
            <ul>
                <i class="fas fa-user-circle"></i>
                <li><span>Ad:</span> <?php echo $ad ?></li>
                <li><span>soyad:</span> <?php echo $soyad ?></li>
                <li><span>Kullanıcı Adı:</span> <?php echo $kullanici_adi ?></li>
            </ul>
        </div>
    </div>
</body>
</html>
</body>
</html>

