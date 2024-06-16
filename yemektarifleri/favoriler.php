<?php
session_start();
include("database.php");
include("tema_baglanti.php");
include("tarif_baglanti.php");
include("uye_baglantisi.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="z-style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/
    releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
</head>
<body>
<?php require("header.php"); ?>
<div class="tarifler">
    <h1 style="text-align:center;" class="card-baslik">
    <i class="far fa-heart"></i>
    <br>
    Favori Tarifler
    </h1>
    <br>
    <ul class="card-containerx">
    <?php 
    if(isset($_GET['uye_id'])) {
        $uye_id = $_GET['uye_id'];
        $sql = "SELECT tarif_id FROM favoriler WHERE uye_id='$uye_id'";
        $favori_result = $conn->query($sql);
        if ($favori_result) {
            while ($favori_row = $favori_result->fetch_assoc()) {
                $tarif_id = $favori_row['tarif_id'];
                $tarif_sql = "SELECT * FROM tarifler WHERE tarif_id='$tarif_id'";
                $tarif_result = $conn->query($tarif_sql);
                if ($tarif_result) {
                    while ($row= $tarif_result->fetch_assoc()) {
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
                    echo "Tarif detayları alınamadı. Hata: " . $conn->error;
                }
            }
        } else {
            echo "Favori tarifler alınamadı. Hata: " . $conn->error;
        }
    
        mysqli_close($conn);
    }
    
    ?>
    </ul>
  </div>
</body>
</html>