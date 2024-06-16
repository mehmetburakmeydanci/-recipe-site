<?php

session_start();

include_once("veriler/tarif_veri.php");
include_once("veriler/kullanici_veri.php");

if (isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

function logout() {
  session_start();
  include("db-connection.php");
  $user_id = $_SESSION['user_id'];
  $sql = "UPDATE users SET user='offline' WHERE id='$user_id'";
  mysqli_query($conn, $sql);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit();
}


if (!isset($_SESSION['uye_id'])){
    header("Location: index.php");
    exit();
}

include("db/db-connection.php");

$uye_id = $_SESSION['uye_id'];

$sql = "SELECT admin_ad, admin_soyad, admin_kullanici_adi, uye_pp FROM admin WHERE uye_id='$uye_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $admin_ad = $row['admin_ad'];
    $admin_soyad = $row['admin_soyad'];
    $admin_kullanici_adi = $row['admin_kullanici_adi'];
    $uye_pp = $row['uye_pp'];

}

// function logout() {
// session_start();
// include("db-connection.php");
// $user_id = $_SESSION['user_id'];
// $sql = "UPDATE users SET user='offline' WHERE id='$user_id'";
// mysqli_query($conn, $sql);
// session_unset();
// session_destroy();
// header("Location: index.php");
// exit();
// }


//verileri çekmek için oluşturulan dosyaları sayfaya dahil ettiğimiz bölüm


?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="media.css">
	<link rel="stylesheet" href="admin-style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  *{
    font-family: 'Poppins', sans-serif
  }


    .content{
      padding: 0px 20px;
      margin: 0 !important;
    }

</style>
</head>
<body>
  <!-- header -->
   <?php require 'header.php'; ?>
    
   <div class="containerx">

      <!-- sidebar -->
      <?php require 'sidebar-left.php'; ?>

      <div class="content">
            
 

            <div id="deleted">
              <?php if(isset($_GET['deleted'])) { ?>
                <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Kullanıcı Silindi</p>
              <?php } ?>
            </div>
          
          

          <br><h1><b>Kullanıcı Verileri</b></h1><br>
          <div class="d-cards">


            <div class="d-card_item" style="padding: 20px; display: flex;" onclick="location.href='users.php'">
                <div class="d-card_item_icon">
                <i class="far fa-user" style="font-size: 50px; color: #00ff008f;"></i>
                </div>
                <div class="d-card_item_contents" style="text-align: left;
                            margin-left: 30px;">
                  <div style=" font-size: 25px;
                              font-weight: 700;">
                  <?php echo $kullanici_sayisi ?>
                  </div>
                  <div style="">
                  Toplam Kayıtlı Kullanıcı
                  </div>
                </div>
            </div>





          </div>

          <br><h1><b>İçerik Verileri</b></h1><br>
          <div class="d-cards">


            <div class="d-card_item" style="padding: 20px; display: flex;" onclick="location.href='users.php'">
                <div class="d-card_item_icon">
                <i class="far fa-user" style="font-size: 50px; color: #00ff008f;"></i>
                </div>
                <div class="d-card_item_contents" style="text-align: left;
                            margin-left: 30px;">
                  <div style=" font-size: 25px;
                              font-weight: 700;">
                  <?php echo $tarif_sayisi ?>
                  </div>
                  <div style="">
                  Onaylı Tarifler
                  </div>
                </div>
            </div>



   



          </div>
        </div> 
    </div>
</body>

</html>