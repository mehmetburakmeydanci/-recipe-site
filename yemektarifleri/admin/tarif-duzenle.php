<?php
session_start();

if (!isset($_SESSION['uye_id'])) {
    header("Location: index.php");
    exit();
}
include("db/db-connection.php");

$uye_id = $_SESSION['uye_id'];

$sql = "SELECT admin_ad, admin_soyad, admin_kullanici_adi, uye_pp FROM admin WHERE uye_id='$uye_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $admin_ad = $row['admin_ad'];
    $admin_soyad = $row['admin_soyad'];
    $admin_kullanici_adi = $row['admin_kullanici_adi'];
    $uye_pp = $row['uye_pp'];

}


if(isset($_GET['tarif_id'])) {
    $tarif_id = $_GET['tarif_id'];

    // Veritabanından bu tarife ait verileri al
    $sql = "SELECT * FROM tarifler WHERE tarif_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $tarif_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $baslik = $row['baslik'];
            $sure = $row['sure'];
            $boyut = $row['boyut'];
            $kalori = $row['kalori'];
            $hazirlanis = $row['hazirlanis'];
            $url = $row['url'];
            $icindekiler = $row['icindekiler'];
            $kategori_ad = $row['kategori_ad'];
            // Resim yolu gibi diğer bilgileri de buradan alabilirsiniz
        } else {
            echo "Tarif bulunamadı.";
            exit;
        }
        $stmt->close();
    } else {
        echo "Sorgu hatası: " . $conn->error;
        exit;
    }
} else {
    echo "Tarif ID bulunamadı.";
    exit;
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="ckeditor/ckeditor.js"></script> <!-- CKEditor scriptini ekleyin -->
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="../style.css">

    <title>blog Oluştur</title>
    <style>
        .malzemele_items{
            display: grid!important;
            grid-template-columns: repeat(4, 1fr)!important;
            padding: 0px 20px!important;
        }
        .div-kategori_ad{
            display: flex;
            gap:1em;
            margin: 20px 0px;
            text-align: center;
        }
        .div-kategori_ad__ic{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php require 'header.php'; ?>
    
    <div class="containerx">
        <!-- sidebar -->
        <?php require 'sidebar-left.php'; ?>

        <div class="content">
            


        <form action="update.php" method="post" enctype="multipart/form-data">
    <h1>Tarif Oluştur</h1>
    <!-- Tarif ID'sini saklamak için gizli bir alan ekleyelim -->
    <?php if(isset($_GET['tarif_id'])) { ?>
        <input type="hidden" name="tarif_id" value="<?php echo $_GET['tarif_id']; ?>">
    <?php } ?>

    <label for="bir">Başlık:</label>
    <input class="tarif-olustur_input" placeholder="Örnek: Çıtır Mantı Tarifi" id="bir" type="text" name="baslik" oninput="convertText()" value="<?php echo $baslik; ?>" required><br>
    <input type="text" name="sure" class="tarif-olustur_input input_sure" placeholder="Süre" value="<?php echo $sure; ?>">
    <input type="text" name="boyut" class="tarif-olustur_input input_sure" placeholder="Boyut" value="<?php echo $boyut; ?>">
    <input type="text" name="kalori" class="tarif-olustur_input input_sure" placeholder="Kalori" value="<?php echo $kalori; ?>">
    <br><br>
    <div class="div-kategori_ad">
        <div class="div-kategori_ad__ic">
            <label for="ehi">Ekmek & Hamur İşleri</label>
            <input type="radio" name="kategori_ad" id="ehi" value="Ekmek & Hamur İşleri" <?php if ($kategori_ad == 'Ekmek & Hamur İşleri') echo 'checked'; ?>>
        </div>
        <div class="div-kategori_ad__ic">
            <label for="tk">Tatlılar & Kurabiyeler</label>
            <input type="radio" name="kategori_ad" id="tk" value="Tatlılar & Kurabiyeler" <?php if ($kategori_ad == 'Tatlılar & Kurabiyeler') echo 'checked'; ?>>
        </div>
        <div class="div-kategori_ad__ic">
            <label for="mhi">Makarna & Hamur İşleri</label>
            <input type="radio" name="kategori_ad" id="mhi" value="Makarna & Hamur İşleri" <?php if ($kategori_ad == 'Makarna & Hamur İşleri') echo 'checked'; ?>>
        </div>
    </div>

    <label for="yazar">Öne Çıkan Görsel:</label>
    <input class="username" type="file" name="resim" accept="image/*" id="imageInput" required><br>
    <img src="" alt="Öne Çıkan Görsel" id="previewImage" style="display: none;">

    <div class="dolap_card__ekle">
        <h2><i class="far fa-plus-circle"></i> Malzemeler</h2>
        <br>
        <div class="malzemele_items">
            <!-- Malzemeleri ve grupları ekrana yazdırma kısmını buraya ekleyebilirsiniz -->
        </div>
    </div>

    <label for="hazirlanis">Hazırlanış:</label><br>
    <textarea class="username" style="background-color: #0d1118; border:none; color:#fff; " name="hazirlanis" rows="10" cols="50" required><?php echo $hazirlanis; ?></textarea><br>

    <label for="iki">Blog URL:</label>
    <input class="tarif-olustur_input" id="iki" placeholder="Örnek: instagram-takipci-kasma" type="text" name="url" value="<?php echo $url; ?>" required><br>

    <input type="submit" name="submit" class="form-button" value="Güncelle">
    <input type="hidden" name="tarif_id" value="<?php echo $tarif_id; ?>">
</form>


            <script>
  document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function() {
      const imgElement = document.getElementById('previewImage');
      imgElement.src = reader.result;
      imgElement.style.display = 'block'; // Görseli ekranda görüntüle
    }

    if (file) {
      reader.readAsDataURL(file);
    }
  });
</script>

            
            <script>
    function convertText() {
        var birInput = document.getElementById("bir");
        var ikiInput = document.getElementById("iki");

        // Türkçe karakterleri ve boşlukları "-" ile değiştir
        var convertedText = birInput.value.trim().toLowerCase().replace(/[\sğüşöçı]/g, function(char) {
            return {
                'ğ': 'g',
                'ü': 'u',
                'ş': 's',
                'ö': 'o',
                'ç': 'c',
                'ı': 'i',
                ' ': '-'
            }[char];
        });

        ikiInput.value = convertedText;
    }
</script>
<script>
        // CKEditor'i etkinleştirin
        CKEDITOR.replace('hazirlanis');
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

        </div>
    </div>
</body>
</html>
