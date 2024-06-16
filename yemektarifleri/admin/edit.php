<?php
session_start();

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
if (isset($_GET["uye_id"])) {
    $uye_id = $_GET["uye_id"];

    require_once ("db/db-connection.php");

    // Veritabanından kullanıcının bilgilerini çek
    $sql = "SELECT * FROM uyeler WHERE uye_id=$uye_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Formda göstermek için kullanıcının bilgilerini değişkenlere ata
    
    $ad = $row['ad'];
    $soyad = $row['soyad'];
    $kullanici_adi = $row['kullanici_adi'];
    $sifre = $row['sifre'];
    $pp = $row['pp'];
    
}

// Form gönderildiğinde veritabanı güncelleme işlemi yap
if (isset($_POST['ad']) && isset($_POST['ad'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];
    $hashed_password = password_hash($sifre, PASSWORD_DEFAULT); // şifreyi hashle

    // Veritabanı güncelleme sorgusu
    $sql = "UPDATE uyeler SET ad='$ad', soyad='$soyad', kullanici_adi='$kullanici_adi', sifre='$hashed_password' WHERE uye_id=$uye_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: users.php?edited=true");
    } else {
        echo "Güncelleme hatası: " . $conn->error;
    }
}




?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
  <link rel="stylesheet" href="admin-style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
     body{
      margin: 0;
    font-family: "Lato", sans-serif;

     }
        .pp{
      
      width: 200px;
      height: 200px;
      background-image: url("<?php echo $row['pp']; ?>");
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 50%;
      background-position: center;
      display: grid;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 40px;
    }
    #bakiye{
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #1d1c1c00;
    border-radius: 5px;
    margin-bottom: 10px;
    font-size: 16px;
    border: 1px solid #8a8a8a7a;
    color: #ffffff;
  }
  </style>
</head>
<body>
  <!-- header -->
   <?php require './header.php'; ?>
    
   <div class="containerx">

      <!-- sidebar -->
    
      <?php require './sidebar-left.php'; ?>
      <div class="content">
            
     

            <div id="deleted">
              <?php if(isset($_GET['deleted'])) { ?>
                <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Kullanıcı Silindi</p>
              <?php } ?>
            </div>

          

              <?php 
              // Formu göster
              echo "<form action='edit.php?uye_id=$uye_id' method='post'>
                      <br><h1><b>Üye Ayarları</b></h1><br>
                      <img onerror='this.src='uploads/bos.png';' id='preview' style='text-align:center;' class='pp' src=''>
        

                      <div class='namesurname'>
                      <input type='text' id='name' name='ad' value='$ad'placeholder='Ad' required>
                      <input type='text' id='surname' name='soyad' value='$soyad' placeholder='Soyad' required>
                      </div>
                      <input class='username' type='text' id='username' name='kullanici_adi' value='$kullanici_adi' placeholder='Kullanıcı Adı' required>
                      <input class='password2' type='password' id='myInput' minlength='8' name='sifre' placeholder='Şifresi'>
                      <div class='chechbox'>
                        <label for='chechbox'>
                        <input id='chechbox' type='checkbox' onclick='pass_hide()' >
                        Şifreyi Göster
                        </label>
                      </div>
                      <input id='submit' class='form-button' type='submit' name='submit' value='Kaydet'>
                    </form>"
                    ;
              ?>

        </div> 
    </div>
    
</body>
<script>
function pass_hide() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>