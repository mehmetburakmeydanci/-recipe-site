<?php
session_start(); // Oturumu başlat
include("database.php");
include("tema_baglanti.php");
include("tarif_baglanti.php");
include("uye_baglantisi.php");
include("session.php");

// Kullanıcı ID'sini al
$uye_id = $_SESSION['uye_id']; // Oturum değişkeni olarak kullanıcı ID'si saklanmışsa





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="z-style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />

</head>
<body>
<?php require("header.php"); ?>
<div class="containerx">
    <div class="dolap_card">
        <br><br><br>
        <h1 style="text-align:center;" class="card-baslik">
            
            <br>
            Dolap
            </h1>
        <br>
        <h3 class="dolap_uyari">Dolabınızda hangi malzemelerin olduğunu buradan görebilirsiniz ve Dolabınızda bulunan malzemeleri güncelleyebilrsiniz.</h3>
        
        <br><br>

        <div class="dolap_card__sides">
            <div class="dolap_card__main">        
                <h1 style="text-align:center;" class="card-baslik dolabim_baslik">
                <br>
                <i style="font-size:50px;" class="fas fa-salad dolabim_icon"></i><br>
                    DOLABIM 
                   
                </h1>
                <br>
                <?php 
                // Database bağlantısı yapılır ve dolap malzemeleri alınır
                include("database.php");

                $sql = "SELECT malzeme_id FROM dolap_malzemeleri WHERE uye_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $uye_id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Dolap malzemelerinin malzeme adlarını çek
                if ($result->num_rows > 0) {
                    echo "<ul class='malzemeler'>";
                    $malzeme_sayac = 1;
                    while ($row = $result->fetch_assoc()) {
                        $malzeme_id = $row["malzeme_id"];

                        // Malzeme adını çek
                        $sql_malzeme = "SELECT malzeme_adi FROM malzemeler WHERE malzeme_id = ?";
                        $stmt_malzeme = $conn->prepare($sql_malzeme);
                        $stmt_malzeme->bind_param("i", $malzeme_id);
                        $stmt_malzeme->execute();
                        $result_malzeme = $stmt_malzeme->get_result();
                        
                        // Malzeme adını ekrana yazdır
                        
                        while ($row_malzeme = $result_malzeme->fetch_assoc()) {
                            echo "<li class='malzemeler_item'>";
                            echo " <span class='malzeme_sayac'>" . $malzeme_sayac . "</span>";
                            echo " <span>" . $row_malzeme['malzeme_adi'] . "</span>";
                            echo "</li>";
                            
                        }
                        $malzeme_sayac++;
                    } 
                    echo "</ul>";
                } else {
                    echo "<span class='dolap_malzeme__uyari'>Dolabında malzeme yok, aşağıdan malzeme eklemen gerekiyor.</span>";
                }
                $stmt->close();
                $conn->close();
                ?>
            </div>
            <h2 class="baslik-t8"></h2>
            <br>
            <div class="dolap_card__ekle">
                <h2><i class="far fa-plus-circle"></i> Malzemeler</h2>
                <br>
                <form action="update_dolap.php" method="POST">
                    <div class="malzemele_items">

                    
                    <?php 
                    include("database.php");

                    // Kullanıcının dolap malzemelerini al
                    $sql = "SELECT malzeme_id FROM dolap_malzemeleri WHERE uye_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $uye_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Dolap malzemelerinin malzeme ID'lerini diziye sakla
                    $dolap_malzemeleri = array();
                    while ($row = $result->fetch_assoc()) {
                        $dolap_malzemeleri[] = $row['malzeme_id'];
                    }

                    // Malzemeler tablosundaki malzeme ID'lerini ve grup bilgilerini al
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

                        // Eğer bu kategoriye ait bir malzeme daha önce eklenmediyse, eklenmişse tekrar ekleme
                        if (!in_array($malzeme_adi, $gruplar[$grup_adi])) {
                            $gruplar[$grup_adi][$malzeme_adi] = $malzeme_id;
                        }
                    }

                    // Grupları ve malzemeleri ekrana yazdır
                    foreach ($gruplar as $grup_adi => $malzemeler) {
                        // Grup başlığını sadece bir kez yazdırmak için döngünün dışında bir h2 etiketi kullanabiliriz
                        echo "<div class='malzeme_ekle'>";
                        echo "<div class='malzeme_ekle__grup_adi'>" . $grup_adi . "</div>";
                        
                    
                        foreach ($malzemeler as $malzeme_adi => $malzeme_id) {
                            echo "<div class='malzeme_ekle_item'>";
                            echo "<div class='malzeme_ekle_item__select'>";
                    
                            if (in_array($malzeme_id, $dolap_malzemeleri)) {
                                
                                echo " <input type='checkbox' class='checkbox' id='malzeme_" . $malzeme_id . "' value='" . $malzeme_id . "' name='selected_materials[]' checked>";
                            } else {
                                echo "<input type='checkbox' class='checkbox' id='malzeme_" . $malzeme_id . "' value='" . $malzeme_id . "' name='selected_materials[]'>";
                            }
                            echo "<label for='malzeme_" . $malzeme_id . "' class='label'>" . $malzeme_adi . "</label>";
                            echo "</div>";
                            echo "</div>";
                            
                        }
                        echo "</div>";
                    }
                    

                    // Veritabanı bağlantısını kapatın
                    $conn->close();
                    ?>


        </div>
        </div>
        <br><br>
        <!-- Güncelle butonu yerine bir link -->
        <input type="submit" class="dolap_card__ekle__submit" value="Güncelle">
        <input type="hidden" name="dolap_id" value="<?php echo $dolap_id; ?>">
        <input type="hidden" name="uye_id" value="<?php echo $uye_id; ?>">
        <input type="hidden" name="malzeme_adi" value="<?php echo $malzeme_adi; ?>">
        
       
    </form>
            </div>
        </div>
    </div>
    <br><br>
</div>
<h2 class="baslik-t8" >
          <a class="card-baslik"  href="">Malzemelerinize Göre Tarifler</a>
      </h2>
      <div class="tarifler" id="result">
      
      <?php
            // Veritabanı bağlantısını dahil edin
            include("database.php");

            // Kullanıcı ID'sini alın
            $uye_id = $_SESSION['uye_id'];

            // 1. Dolap malzemelerini al
            $sql_dolap_malzemeleri = "SELECT malzeme_id FROM dolap_malzemeleri WHERE uye_id = ?";
            $stmt_dolap_malzemeleri = $conn->prepare($sql_dolap_malzemeleri);
            $stmt_dolap_malzemeleri->bind_param("i", $uye_id);
            $stmt_dolap_malzemeleri->execute();
            $result_dolap_malzemeleri = $stmt_dolap_malzemeleri->get_result();

            // Dolap malzemelerinin malzeme ID'lerini diziye sakla
            $dolap_malzemeleri_ids = array();
            while ($row = $result_dolap_malzemeleri->fetch_assoc()) {
                $dolap_malzemeleri_ids[] = $row['malzeme_id'];
            }

            // 2. Malzemelerin adlarını al
            $sql_malzeme_adlari = "SELECT malzeme_id, malzeme_adi FROM malzemeler WHERE malzeme_id IN (" . implode(",", $dolap_malzemeleri_ids) . ")";
            $result_malzeme_adlari = $conn->query($sql_malzeme_adlari);
            if (!$result_malzeme_adlari) {
                die("        <h3 styl='text-align:center;' class='dolap_uyari'>Dolabınız boş görünüyor...</h3><br><br><br>");
            }
            
            // Sorgu başarılı ise devam edin
            $malzemeler = array();
            while ($row = $result_malzeme_adlari->fetch_assoc()) {
                $malzemeler[$row['malzeme_id']] = $row['malzeme_adi'];
            }

            // 3. Tarifleri bul
            $sql_tarifler = "SELECT * FROM tarifler WHERE";
            foreach ($malzemeler as $malzeme_id => $malzeme_adi) {
                $sql_tarifler .= " FIND_IN_SET('" . $malzeme_id . "', icindekiler) OR";
            }
            $sql_tarifler = rtrim($sql_tarifler, "OR"); // Son "OR" ifadesini kaldır
            $result_tarifler = $conn->query($sql_tarifler);

            // 4. Tarifleri listeleyin
            if ($result_tarifler->num_rows > 0) {
                echo "<ul class='card-containerx'>";
                while ($row = $result_tarifler->fetch_assoc()) {
                    $tarif_id = $row['tarif_id']; 
                    $kategori = $row['kategori_ad'];
                    $baslik = $row['baslik'];
                    $sure = $row['sure'];
                    $boyut = $row['boyut'];
                    $kalori = $row['kalori'];
                    $resim = $row['resim'];
                    $url = $row['url'];

                    
                    echo "<li class='tarif-card'>";
                    echo "<div class='img-div'>";
                    echo "<img class='img-div' src='" . $row["resim"] . "' alt=''>";
                    echo "</div>";
                    echo "<div class='tarif-content'>";
                    echo "<h2 class='tarif-kategori'>" . $row["kategori_ad"] . "</h2>";
                    echo "<h1 class='tarif-baslik'>
                    <a href='" . $row['url'] . "?tarif_id=" . $tarif_id . "'>" . $row["baslik"] . "</a>                        </h1>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-clock'></i> " . $row["sure"] . "</h2>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-utensils'></i> " . $row["boyut"] . "</h2>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-burn'></i> " . $row["kalori"] . "</h2>";
                    echo "<div class='tarif-card_bottom'>";
                    echo "<div class='yazar'>";
                    echo "<img src='yemeksehri.jpeg' alt=''>";
                    echo "YemekTarifleri";
                    echo "<div class='degerlendirme'>";
                    echo "<div class='favgor'>
                                  <i class='far fa-eye'></i> <span>" . $row["goruntulenme"] . "</span>
                                  <i class='fas fa-heart'></i> <span>" . $row["fav"] . "</span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</li>";
                }
               
            } else {
                echo "Tarif bulunamadı.";
            }

            // Bağlantıyı kapatın
            $conn->close();
            ?>
    </ul>
    </div>

</body>
</html>
