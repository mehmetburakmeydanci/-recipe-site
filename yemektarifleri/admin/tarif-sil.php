<?php
if (isset($_GET["tarif_id"])) {
    $tarif_id = $_GET["tarif_id"];

    // Veritabanı bağlantı bilgileri
    $server = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "yemek_tarifleri";

    // Veritabanı bağlantısını oluştur
    $conn = new mysqli($server, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // İlişkili kayıtları silme
    $sql_favoriler = "DELETE FROM favoriler WHERE tarif_id = ?";
    if ($stmt_favoriler = $conn->prepare($sql_favoriler)) {
        $stmt_favoriler->bind_param("i", $tarif_id);
        if (!$stmt_favoriler->execute()) {
            echo "Favoriler tablosundaki kayıtlar silinemedi: " . $stmt_favoriler->error;
            $stmt_favoriler->close();
            $conn->close();
            exit();
        }
        $stmt_favoriler->close();
    } else {
        echo "Favoriler tablosu için SQL hatası: " . $conn->error;
        $conn->close();
        exit();
    }

    // Ana kaydı silme
    $sql_tarifler = "DELETE FROM tarifler WHERE tarif_id = ?";
    if ($stmt_tarifler = $conn->prepare($sql_tarifler)) {
        $stmt_tarifler->bind_param("i", $tarif_id);
        if ($stmt_tarifler->execute()) {
            $stmt_tarifler->close();
            $conn->close();
            header("Location: tarifler.php?deleted=true");
            exit();
        } else {
            echo "Tarifler tablosundaki kayıt silinemedi: " . $stmt_tarifler->error;
        }
    } else {
        echo "Tarifler tablosu için SQL hatası: " . $conn->error;
    }

    // Bağlantıyı kapat
    $conn->close();
} else {
    echo "tarif_id değeri belirtilmedi.";
}
?>
