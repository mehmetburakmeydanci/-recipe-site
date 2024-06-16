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


    $resim = "uploads/pide.jpg";

    $sql = "INSERT INTO tarifler (baslik, sure, boyut, kalori, hazirlanis, url, icindekiler, kategori_ad, resim) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $baslik, $sure, $boyut, $kalori, $hazirlanis, $url, $icindekiler, $kategori_ad, $resim);
        if ($stmt->execute()) {
            echo "Tarif başarıyla oluşturuldu.";
        } else {
            echo "Tarif oluşturulamadı: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "SQL hatası: " . $conn->error;
    }


   
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
            


            <form action="tarif-olustur.php" method="post" enctype="multipart/form-data">
                <h1>Tarif Oluştur</h1>
                <label for="bir">Başlık:</label>
                <input class="tarif-olustur_input" placeholder="Örnek: Çıtır Mantı Tarifi" id="bir" type="text" name="baslik" oninput="convertText()" value="" required><br>
                <input type="text" name="sure" class="tarif-olustur_input input_sure" placeholder="Süre">
                <input type="text" name="boyut" class="tarif-olustur_input input_sure" placeholder="Boyut">
                <input type="text" name="kalori" class="tarif-olustur_input input_sure" placeholder="Kalori">
                <br><br>
                <div class="div-kategori_ad">

                <div class="div-kategori_ad__ic">
                    <label for="ehi">Ekmek & Hamur İşleri</label>
                    <input type="radio" name="kategori_ad" id="ehi" value="Ekmek & Hamur İşleri">
                </div>

                <div class="div-kategori_ad__ic">
                    <label for="tk">Tatlılar & Kurabiyeler</label>
                    <input type="radio" name="kategori_ad" id="tk" value="Tatlılar & Kurabiyeler">
                </div>

                <div class="div-kategori_ad__ic">
                    <label for="mhi">Makarna & Hamur İşleri</label>
                    <input type="radio" name="kategori_ad" id="mhi" value="Makarna & Hamur İşleri">
                </div>

                </div>
              

                <label for="yazar">Öne Çıkan Görsel:</label>
                <input class="username" type="file" name="resim" accept="image/*" id="imageInput" required><br>
                <img src="" alt="Öne Çıkan Görsel" id="previewImage" style="display: none;">


                <div class="dolap_card__ekle">
                <h2><i class="far fa-plus-circle"></i> Malzemeler</h2>
                <br>
                
                    <div class="malzemele_items">
                    <?php 
                    include("../database.php");

                    // Malzemeler tablosundaki malzeme ID'lerini, adlarını ve grup bilgilerini al
                    $sql = "SELECT malzeme_id, malzeme_adi, grup_adi FROM malzemeler";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Sorgu hatası: " . $conn->error);
                    }

                    // Malzemeleri gruplara göre organize et
                    $gruplar = array();
                    while ($row = $result->fetch_assoc()) {
                        $grup_adi = $row['grup_adi'];
                        $malzeme_adi = $row['malzeme_adi'];
                        $malzeme_id = $row['malzeme_id'];

                        if (!isset($gruplar[$grup_adi])) {
                            $gruplar[$grup_adi] = array();
                        }

                        // Eğer bu kategori_adye ait bir malzeme daha önce eklenmediyse, eklenmişse tekrar ekleme
                        if (!in_array($malzeme_adi, $gruplar[$grup_adi])) {
                            $gruplar[$grup_adi][$malzeme_adi] = $malzeme_id;
                        }
                    }


                    // Grupları ve malzemeleri ekrana yazdır
                    foreach ($gruplar as $grup_adi => $malzemeler) {
                        echo "<div class='malzeme_ekle'>";
                        echo "<div class='malzeme_ekle__grup_adi'>" . $grup_adi . "</div>";
                        
                        foreach ($malzemeler as $malzeme_adi => $malzeme_id) {
                            echo "<div class='malzeme_ekle_item'>";
                            echo "<div class='malzeme_ekle_item__select'>";
                            echo "<input type='checkbox' class='checkbox' id='malzeme_" . $malzeme_id . "' value='" . $malzeme_id . "' name='selected_materials[]'>";
                            echo "<label for='malzeme_" . $malzeme_id . "' class='label'>" . $malzeme_adi . "</label>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }


                    $conn->close();
                    ?>



</div>
</div>

                <label for="hazirlanis">hazirlanis:</label><br>
                <textarea class="username" style="background-color: #0d1118; border:none; color:#fff; " name="hazirlanis" rows="10" cols="50" required></textarea><br>

                <label for="iki">blog URL:</label>
                <input class="tarif-olustur_input" id="iki" placeholder="Örnek: instagram-takipci-kasma" type="text" name="url" value="" required><br>

                <input class="form-button" type="submit" name="submit" value="Oluştur">
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
