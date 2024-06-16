<?php
session_start();
include("database.php");
include("tema_baglanti.php");
include("tarif_baglanti.php");
include("uye_baglantisi.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
    <link rel="stylesheet" href="media.css">
</head>
<body>
<?php include ("header.php"); ?>
    <div class="containerx">
    <br><br>
    <div class="tarifler">
    <h1 style="text-align:center" class="card-baslik"> Editörün Seçtikleri</h1><br>
    <ul class="card-containerx">


<?php
// Veritabanından tüm tarifleri al
$query = "SELECT * FROM tarifler";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='tarif-card'>";
        echo "<div class='img-div'>";
        echo "<img class='img-div' src='" . $row["resim"] . "' alt=''>";
        echo "</div>";
        echo "<div class='tarif-content'>";
        echo "<h2 class='tarif-kategori'>" . $row["kategori_ad"] . "</h2>";
        echo "<h1 class='tarif-baslik'><a href='tarif.php?tarif_id=" . $row['tarif_id'] . "'>" . $row["baslik"] . "</a></h1>";
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
</body>
</html>