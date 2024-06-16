<?php
session_start();

if (!isset($_SESSION['uye_id'])){
  header("Location: index.php");
  exit();
}
include_once("db/db-connection.php");
include("../database.php");
include("../tema_baglanti.php");
include("../tarif_baglanti.php");
include("../uye_baglantisi.php");


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

?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="media.css">
	<link rel="stylesheet" href="admin-style.css">
  <link rel="stylesheet" href="bloglar-style.css">
  <link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <style>
    .blogdisdiv{
      grid-template-columns: auto !important;
    }
    .card-containerx{
      grid-template-columns: repeat(3, 1fr) !important;
    }
    .tarif-card:hover{

    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php require 'header.php'; ?>
<?php require 'sidebar-left.php'; ?>
    
<body>
  <div class="containerx">
  <div class="content">
    <div id="deleted" style="z-index:1;">
              <?php if(isset($_GET['blogdeleted'])) { ?>
                <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Blog Silindi</p>
              <?php } ?>
            </div>
            <br><br><h1><b>Tarifler</b></h1>

        <div class="blogdisdiv">

        <div class="tarifler">
    <ul class="card-containerx">


      <?php
      // Veritabanından tüm tarifleri al
      $query = "SELECT * FROM tarifler";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<li class='tarif-card'>";
              echo '<div class="buttons_x">' . "\n";
              echo '  <div class="button_x sil_x">' . "\n";
              echo '<a href="tarif-sil.php?tarif_id=' . $row['tarif_id'] . '">Sil</a><br>';
              echo '  </div>' . "\n";
              echo '  <div class="button_x duzenle_x">' . "\n";
              echo '    <a href="tarif-duzenle.php?tarif_id=' . $row['tarif_id'] . '">Düzenle</a>' . "\n";
              echo '  </div>' . "\n";
              echo '</div>' . "\n";
              echo "<div class='img-div'>";
              echo "<img class='img-div' src='../" . $row["resim"] . "' alt=''>";
              echo "</div>";
              echo "<div class='tarif-content'>";
              echo "<h2 class='tarif-kategori'>" . $row["kategori_ad"] . "</h2>";
              echo "<h1 class='tarif-baslik'><a href='tarif.php?tarif_id=" . $row['tarif_id'] . "'>" . $row["baslik"] . "</a></h1>";
              echo "<h2 class='tarif-bilgi'><i class='fas fa-clock'></i> " . $row["sure"] . "</h2>";
              echo "<h2 class='tarif-bilgi'><i class='fas fa-utensils'></i> " . $row["boyut"] . "</h2>";
              echo "<h2 class='tarif-bilgi'><i class='fas fa-burn'></i> " . $row["kalori"] . "</h2>";
              echo "<div class='tarif-card_bottom'>";
              echo "<div class='yazar'>";
              echo "<img src='../yemeksehri.jpeg' alt=''>";
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
    </div>
  </div>
</body>


    
<script>
   
   document.getElementById('edited').style.display = 'grid';
 setTimeout(function() {
  
   document.getElementById('edited').style.display = 'none';
 }, 3000); 
</script>
<script>
   document.getElementById('deleted').style.display = 'grid';
  
 setTimeout(function() {
   document.getElementById('deleted').style.display = 'none';
   
 }, 3000); // 3000 milisaniye (3 saniye) bekle
</script>
