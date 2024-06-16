<?php 
session_start();
include("db-connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_kullanici_adi = $_POST['admin_kullanici_adi'];
    $sifre = $_POST['sifre'];

    // SQL Injection önlemek için hazırlıklı ifadeler kullanın
    $sql = "SELECT * FROM admin WHERE admin_kullanici_adi = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_kullanici_adi);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Şifre doğrulama
        if (password_verify($sifre, $row['sifre'])) {
            $_SESSION['uye_id'] = $row['uye_id'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Yanlış şifre
            header("Location: ../index.php?login_error=true");
            exit();
        }
    } else {
        // Kullanıcı adı bulunamadı
        header("Location: ../index.php?login_error=true2");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
