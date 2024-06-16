<?php
session_start();
require("database.php");
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT kullanici_adi FROM uyeler WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($kullanici_adi);
        $stmt->fetch();
        
        $reset_token = bin2hex(random_bytes(16)); // Rastgele bir sıfırlama kodu oluştur
        $stmt = $conn->prepare("UPDATE uyeler SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $reset_token, $email);
        $stmt->execute();

        // PHPMailer ile e-posta gönder
        $mail = new PHPMailer(true);
        try {
            // Sunucu ayarları
            $mail->isSMTP();
            $mail->Host = 'smtp.yandex.ru'; // SMTP sunucusu
            $mail->SMTPAuth = true;
            $mail->Username = 'info@deryamakine.com'; // SMTP kullanıcı adı
            $mail->Password = 'deryainfo123'; // SMTP şifresi
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            // Karakter seti ve içerik türü ayarları
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);

            // Alıcılar
            $mail->setFrom('info@deryamakine.com', 'Yemek Tarifleri');
            $mail->addAddress($email); // Alıcı e-posta adresi

            // İçerik
            $mail->Subject = 'Şifre Sıfırlama Talebi';
            $mail->Body    = "Şifrenizi sıfırlamak için aşağıdaki bağlantıya tıklayın: <a href='http://localhost/reset-password.php?token=$reset_token'>Şifre Sıfırlama Bağlantısı</a>";

            $mail->send();
            $message = 'Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.';
        } catch (Exception $e) {
            $message = 'E-posta gönderilirken bir hata oluştu. Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        $message = 'Bu e-posta adresine kayıtlı bir kullanıcı bulunamadı.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Aktivasyon</title>
</head>
<body>
<?php include ("header.php"); ?>
      <br>
    <div class="giris-page">
        <div class="giris-card">
            <img src="yemeksehri.jpeg" alt="">
            <h1>Şifre Sıfırlama</h1>
            <h2><?php echo $message; ?></h2> 
            
        </div>
    </div>
</body>
</html>