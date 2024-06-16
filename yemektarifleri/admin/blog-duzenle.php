<?php
session_start();
include("db/db-connection.php");

if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

if (isset($_GET["url"])) {
    $url = $_GET["url"];
  
    // Veritabanından kullanıcının bilgilerini çekmek için SQL sorgusu hazırlayın ve güvenlik için parametreleri kullanın
    $sql = "SELECT * FROM bloglar WHERE url=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $url);
    $stmt->execute();
    $result = $stmt->get_result();
  
    // blog verilerini çekin
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $baslik = $row['baslik'];
        $icerik = $row['icerik'];
        $yazar = $row['yazar'];
        $img = $row['img'];
    } else {
        echo "blog bulunamadı.";
    }
}

if (isset($_POST['submit'])) {
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $yazar = $_POST['yazar'];

    // Görsel değiştirme işlemini kontrol et
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $new_image = "uploads/" . $_FILES['image']['name'];
        move_uploaded_file($image_tmp, $new_image);
        $img = $new_image; // Görseli güncellemek için yeni yolu atayın
    }

    $sql = "UPDATE bloglar SET baslik=?, icerik=?, yazar=?, img=? WHERE url=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $baslik, $icerik, $yazar, $img, $url);

    if ($stmt->execute()) {
        echo "blog başarıyla güncellendi.";
    } else {
        echo "Güncelleme hatası: " . $conn->error;
    }
}
?>
<head>
<script src="ckeditor/ckeditor.js"></script> <!-- CKEditor scriptini ekleyin -->
<style>
    .deneme {
        height: 100px;
    }
</style>
</head>


<?php 
// Formu göster
echo "<form action='blog-duzenle.php?url=$url' method='post'>
    <img class='deneme' src='" . $row["img"] . "' alt='" . $row["baslik"] . "'>
    <label for='baslik'>Başlık:</label>
    <input type='text' id='baslik' name='baslik' value='$baslik' required><br>

    <label for='yazar'>Yazar:</label>
    <input type='text' id='yazar' name='yazar' value='$yazar' required><br>

    <label for='icerik'>İçerik:</label><br>
    <textarea id='icerik' name='icerik' rows='10' cols='50' required>$icerik</textarea><br>

    <label for='image'>blog Görseli:</label>
    <input type='file' id='image' name='image' accept='image/*' ><br>

    <input type='submit' name='submit' value='blogyi Güncelle'>
</form>";
?>
    <script>
        // CKEditor'i etkinleştirin
        CKEDITOR.replace('icerik');
    </script>
<script>
    // CKEditor'i etkinleştirin ve yapılandırma seçeneklerini özelleştirin
    CKEDITOR.replace('editor1', {
        height: 300, // Metin düzenleme alanının yüksekliği (piksel cinsinden)
        toolbar: 'Basic', // Kullanılacak araç çubuğu (Basic, Full, Custom seçenekleri mevcuttur)
        language: 'en', // Dil seçeneği (örneğin, en: İngilizce, tr: Türkçe)
        // Diğer yapılandırma seçeneklerini burada belirtebilirsiniz
    });
</script>
