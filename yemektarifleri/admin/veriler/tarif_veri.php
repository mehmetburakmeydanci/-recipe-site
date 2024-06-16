<?php
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

// Tarifler tablosundaki kayıt sayısını bul
$sql = "SELECT COUNT(*) AS tarif_sayisi FROM tarifler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tarif_sayisi = $row["tarif_sayisi"];
    
} else {
   
}

// Bağlantıyı kapat
$conn->close();
?>
