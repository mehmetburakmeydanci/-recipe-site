<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Formdan gelen veriler
    $tarif_id = $_POST['tarif_id']; // URL'den gelen tarif ID'sini al

    $baslik = $_POST["baslik"];
    $sure = $_POST["sure"];
    $boyut = $_POST["boyut"];
    $kalori = $_POST["kalori"];
    $hazirlanis = $_POST["hazirlanis"];
    $url = $_POST["url"];

    // Malzemeleri virgülle ayırarak birleştir
    if (isset($_POST['selected_materials'])) {
        $icindekiler = implode(",", $_POST['selected_materials']);
    } else {
        $icindekiler = "";
    }

    $kategori_ad = "";
    if (isset($_POST['kategori_ad'])) {
        $kategori_ad = $_POST['kategori_ad'];
    }

    $resim = "uploads/pide.jpg"; // Örnek resim yolu, gerçek bir resim yolu alınabilir

    // Tarifi güncelle
    $sql = "UPDATE tarifler SET baslik=?, sure=?, boyut=?, kalori=?, hazirlanis=?, url=?, icindekiler=?, kategori_ad=?, resim=? WHERE tarif_id=?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssssi", $baslik, $sure, $boyut, $kalori, $hazirlanis, $url, $icindekiler, $kategori_ad, $resim, $tarif_id);
        if ($stmt->execute()) {
            header("Location: tarifler.php");
        } else {
            echo "Tarif güncellenemedi: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "SQL hatası: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Bu sayfa doğrudan erişilemez.";
}
?>
