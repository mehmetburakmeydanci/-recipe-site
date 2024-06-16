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
</head>
<body>
<?php require ("header.php"); ?>
      <br>
    <div class="giris-page">
        <div class="giris-card">
            <img src="yemeksehri.jpeg" alt="">
            <h1>GİRİŞ</h1>
           
                <form class="giris-form" action="baglanti/login.php" method="post">
                    <div class="username">
                        <input type="text" id="kullanici_adi" name="kullanici_adi" placeholder="Kullanıcı Adı" required>
                    </div>
                    <div class="password">
                        <input type="password" id="sifre" name="sifre" placeholder="Şifre" required>
                    </div>
                    <?php
                    if (isset($_GET["error"])) {
                        echo "<p style='color:red;'>Hatalı Kullanıcı Adı veya Şifre</p>";
                    }
                ?>
                    <button type="submit">
                        Giriş Yap
                    </button>
                </form>
                <div class="hesabin-yok-mu">
                    <br>
                    <h5>Hesabın Yok Mu?</h5>
                    <div class="kayit-ol">
                        <a href="kayit-ol.php">Kayıt Ol</a>
                    </div>
                </div>
                <div class="sifremi-unuttum">
                    <a href="forgot-password.php">Şifremi Unuttum</a>
                </div>
        </div>
    </div>
</body>
</html>
