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

$dash_user__query = "SELECT * from uyeler";
$dash_user_query_run = mysqli_query($conn, $dash_user__query);

  if ($kullanici_sayisi = mysqli_num_rows($dash_user_query_run)) {
  }
?>