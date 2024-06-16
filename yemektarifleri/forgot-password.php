<?php
session_start();
require("database.php");

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
    <title>Şifremi Unuttum</title>
</head>
<body>
<?php require ("header.php"); ?>
      <br>
    <div class="giris-page">
        <div class="giris-card">
            <h1>Şifremi Unuttum</h1>
            <form class="giris-form" action="send-reset-link.php" method="post">
                <div class="username">
                    <input type="email" id="email" name="email" placeholder="E-posta" required>
                </div>
                <button type="submit">
                    Şifre Sıfırlama Linki Gönder
                </button>
            </form>
        </div>
    </div>
</body>
</html>
