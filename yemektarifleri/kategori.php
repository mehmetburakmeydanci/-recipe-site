<?php 
session_start();
require ("database.php");
include("tarif_baglanti.php");
include("uye_baglantisi.php");
include("tema_baglanti.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
</head>
<body>
    <?php require("header.php"); ?>
    <div class="tarifler">
    <div class="kategoriler">

            <?php 
                    $kategori_url = $_GET['kategori'];
                    $query = "SELECT * from kategoriler WHERE kategori_url='$kategori_url'";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);
                            echo "<div class='img-div_3141'>";
                            echo "<span>";   
                            echo $row['kategori_ad'];   
                            echo "</span>";   
                            echo "<img src='" . $row["kategori_img"] . "' alt=''>";

                            echo "</div>";   
                       
                    }

            ?>                        

    </div>
        <ul class="card-containerx">
            <?php 
        
                $kategori_url = $_GET['kategori'];
            
                $sql = "SELECT * FROM tarifler WHERE kategori_url='$kategori_url'";
                $result = $conn->query($sql);

                if (mysqli_num_rows($result) > 0){
                    while($satir = mysqli_fetch_assoc($result)) {
                    echo "<li class='tarif-card'>";
                    echo "<div class='img-div'>";
                    echo "<img class='img-div' src='" . $satir["resim"] . "' alt=''>";
                    echo "</div>";
                    echo "<div class='tarif-content'>";
                    echo "<h2 class='tarif-kategori'>" . $satir["kategori_ad"] . "</h2>";
                    echo "<h1 class='tarif-baslik'><a href='" . $satir['url'] . "?tarif_id=" . $satir['tarif_id'] . "'>" . $satir["baslik"] . "</a></h1>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-clock'></i> " . $satir["sure"] . "</h2>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-utensils'></i> " . $satir["boyut"] . "</h2>";
                    echo "<h2 class='tarif-bilgi'><i class='fas fa-burn'></i> " . $satir["kalori"] . "</h2>";
                    echo "<div class='tarif-card_bottom'>";
                    echo "<div class='yazar'>";
                    echo "<img src='yemeksehri.jpeg' alt=''>";
                    echo "YemekTarifleri";
                    echo "<div class='degerlendirme'>";
                    echo "<span class='fa fa-star checked'></span>";
                    echo "<span class='fa fa-star checked'></span>";
                    echo "<span class='fa fa-star checked'></span>";
                    echo "<span class='fa fa-star checked'></span>";
                    echo "<span class='fa fa-star no-checked'></span>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</li>";
                    }
                }
        
            ?>
        </ul>
  </div>
</body>
</html>