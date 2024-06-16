<?php
if (isset($_SESSION['uye_id'])){
    header("Location: ./");
    exit();
}



?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include ("header.php"); ?>
      <br>
    <div class="giris-page">
        <div class="giris-card">
            <img src="yemeksehri.jpeg" alt="">
            <h1>KAYIT OL</h1>
          
                <form class="giris-form" action="baglanti/register.php" method="POST">
                    <div class="name">
                        <input type="text" id="ad" name="ad" placeholder="Ad">
                    </div>
                    <div class="surname">
                        <input type="text" id="soyad" name="soyad" placeholder="Soyad">
                    </div>
                    <div class="username">
                        <input type="text" id="kullanici_adi" name="kullanici_adi" placeholder="Kullanıcı Adı">
                    </div>
                    <div class="password">
                        <input type="password" id="sifre" name="sifre" placeholder="Şifre">
                    </div>
                    <button type="submit">
                        Kayıt Ol
                    </button>
                </form>
        </div>
    </div>
</body>
</html>