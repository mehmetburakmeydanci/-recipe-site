<?php
// Veritabanı bağlantısını dahil edin
include("database.php");

// Kullanıcı ID'sini alın
$uye_id = $_POST['uye_id'];

$sql = "SELECT dolap_id FROM dolaplar WHERE uye_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uye_id);
$stmt->execute();
$result = $stmt->get_result();

// Dolap_id'leri ekrana yazdır
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dolap_id = $row["dolap_id"];
        
        // Dolaptan malzemeleri silmek için SQL sorgusu
        $sql_delete = "DELETE FROM dolap_malzemeleri WHERE uye_id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("i", $uye_id);
        $stmt_delete->execute();

        // Seçili malzemeleri dolaba eklemek için SQL sorgusu
        $sql_insert = "INSERT INTO dolap_malzemeleri (uye_id, malzeme_id, dolap_id) VALUES (?, ?, ?)";

        // Form verilerinden seçili malzemeleri alın ve dolap ID'sini alın
        $selected_materials = $_POST['selected_materials']; // Örneğin, formdan seçili malzemeleri almak için kullanılan isim

        // Her bir seçili malzeme için veritabanına ekleme işlemi yapın
        foreach ($selected_materials as $malzeme_id) {
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iii", $uye_id, $malzeme_id, $dolap_id);
            $stmt_insert->execute();
        }
    }
    
    $conn->close();

    // Kullanıcıyı başka bir sayfaya yönlendirin (isteğe bağlı)
    header("Location: dolap.php#result"); // Örneğin, kullanıcıyı dolap sayfasına yönlendir
    exit();
} else {
    echo "Kullanıcının bir dolabı yok.";
}
?>
