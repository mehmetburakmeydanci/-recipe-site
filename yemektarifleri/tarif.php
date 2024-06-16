<?php
session_start();
include("database.php");
include("tema_baglanti.php");
include("tarif_baglanti.php");
include("uye_baglantisi.php");

if (isset($_GET['tarif_id'])) {
    $tarif_id = $_GET['tarif_id'];

    $updateSql = "UPDATE tarifler 
    SET goruntulenme = goruntulenme + 1 WHERE tarif_id = '$tarif_id'";
    $conn->query($updateSql);
    
    $sql = "SELECT * FROM tarifler WHERE tarif_id = '$tarif_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $tarif_id_zx = $row['tarif_id'];
        $kategori_zx = $row['kategori_ad'];
        $baslik_zx = $row['baslik'];
        $sure_zx = $row['sure'];
        $boyut_zx = $row['boyut'];
        $kalori_zx = $row['kalori'];
        $resim_zx = $row['resim'];
        $url_zx = $row['url'];
        $icindekiler_zx = $row['icindekiler'];
        $hazirlanis_zx = $row['hazirlanis'];
        $tarih_zx = $row['tarih'];
        $goruntulenme_zx = $row['goruntulenme'];
        $fav_zx = $row['fav'];

        $kelimeler = explode(',', $icindekiler_zx);
       

    } else {
        echo "Tarif bulunamadı.";
    }



    if (isset($_SESSION["uye_id"])) {

        $favorisql = "SELECT * FROM favoriler WHERE tarif_id = '$tarif_id' AND uye_id = '$uye_id'";
        $result = $conn->query($favorisql);
        
        if (!$result) {
            die("Sorgu hatası: " . $conn->error);
        }
        if ($result->num_rows > 0) {
            $favoriekle = "block !important";
            $favoricikar = "none !important";
        } else {
            $favoriekle = "none !important";
            $favoricikar = "block !important";
        }
    } else {
        $favoriekle = "none !important";
        $favoricikar = "none !important";
    }
  

    

    $conn->close();
} else {
    echo "Tarif ID'si belirtilmedi.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://pro.fontawesome.com
      /releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
    <link rel="stylesheet" href="media.css">    
</head>
<style>

</style>
<body>
<?php require ("header.php"); ?>
<br>

<div class="containerx">

        <br><br>
      
        <div class="tarif-sayfa">
            <div class="tarif-icerik">
                <div class="tarif-gorsel">
                    <div >
                    <a style="display:<?php echo $favoricikar; ?>;" 
                    class="fav-eklecikar" href="favorilere-ekle.php?tarif_id=<?php echo $tarif_id_zx ?>">
                                    <div class="fav-in">
                                        <i class="fas fa-heart"></i> 
                                        Favorilere ekle
                                    </div>
                    </a>
                    <a style="display:<?php echo $favoriekle; ?>;" 
                    class="fav-eklecikar" href="favorilerden-cikar.php?tarif_id=<?php echo $tarif_id_zx ?>">
                                    <div class="fav-in2">
                                        <i class="fas fa-times-circle"></i>
                                         Favorilerden Çıkar
                                    </div>
                    </a>
                            <img class="tarif-gorsel_in" src="<?php echo $resim_zx ?>" alt="">
                    </div>
                    <br>
                    <h1><?php echo $baslik_zx ?></h1>
                    <div class="detays">
                        
                        <div class="tarih">
                            <div class="tarih-div">
                                <i class="far fa-clock"></i> <?php echo $tarih_zx ?>
                            </div>
                        </div>
                        <div class="tarif-ekbilgiler">
                            <ul>
                                <li><i class="fas fa-clock"></i> <?php echo $sure_zx ?></li>
                                <li><i class="fas fa-utensils"></i> <?php echo $boyut_zx ?></li>
                                <li><i class="fas fa-burn"></i> <?php echo $kalori_zx ?></li>
                            </ul>
                        </div>
                        <div class="favgor">
                            <i class="far fa-eye"></i> <span><?php echo $goruntulenme_zx ?></span>
                            <i class="fas fa-heart"></i> <span><?php echo $fav_zx ?></span>
                        </div>
                    </div>
                </div>
                <div class="icindekiler">
                        <h2><i class="fas fa-chevron-circle-right"></i> İçindekiler</h2>
                        <?php 
                            echo "<ul class='icindekiler-list'>";
                            foreach ($kelimeler as $kelime) {
                                // Malzeme ID'yi kullanarak malzeme adını al
                                $sql_malzeme_adi = "SELECT malzeme_adi FROM malzemeler WHERE malzeme_id = '$kelime'";
                                $result_malzeme_adi = $conn->query($sql_malzeme_adi);
                                if ($result_malzeme_adi->num_rows > 0) {
                                    $row_malzeme_adi = $result_malzeme_adi->fetch_assoc();
                                    $malzeme_adi = $row_malzeme_adi['malzeme_adi'];
                                    echo "<li>" . htmlspecialchars($malzeme_adi) . "</li>";
                                }
                            }
                        ?>
                </div>
                <div class="hazirlanis">
                    <h2><i class="fas fa-chevron-circle-right"></i> Hazırlanış</h2>
                            



                    <?php 
                            echo $hazirlanis_zx;
  
                        ?>
                </div>

            </div>
            <div class="populerler-sutun">
                <h2><span><i class="fas fa-fire-alt"></i></span> Popüler Tarifler</h3>
                <ul>
                <?php
                    include("database.php");
                    // Veritabanından tüm tarifleri al
                    $query = "SELECT * FROM tarifler LIMIT 4";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li class='tarif-card'>";
                            echo "<div class='img-div'>";
                            echo "<img class='img-div' src='" . $row["resim"] . "' alt=''>";
                            echo "</div>";
                            echo "<div class='tarif-content'>";
                            echo "<h2 class='tarif-kategori'>" . $row["kategori_ad"] . "</h2>";
                            echo "<h1 class='tarif-baslik'>
                            <a href='tarif.php?tarif_id=" . $row['tarif_id'] . "'>" . $row["baslik"] . "</a>
                            </h1>";
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
                            echo "</div>";
                            echo "</li>";
                        }
                    } else {
                        echo "Henüz hiç tarif eklenmemiş.";
                    }

                    mysqli_close($conn);
                    ?>
                </ul>
            </div>

        </div>
    </div>
</body>
</html>