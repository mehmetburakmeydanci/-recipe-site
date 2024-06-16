<?php
session_start();
require("database.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    echo "Geçersiz bağlantı.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Şifre Sıfırla</title>
</head>
<body>
<?php require ("header.php"); ?>
      <br>
    <div class="giris-page">
        <div class="giris-card">
            <h1>Yeni Şifre Belirle</h1>
            <form class="giris-form" action="update-password.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="password">
                    <input type="password" id="yeni_sifre" name="yeni_sifre" placeholder="Yeni Şifre" required>
                </div>
                <button type="submit">
                    Şifreyi Güncelle
                </button>
            </form>
        </div>
    </div>
</body>
</html>
