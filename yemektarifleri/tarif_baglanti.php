<?php 
include ("database.php");
$sql = "SELECT * FROM tarifler";
$result = $conn->query($sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $tarif_id = $row['tarif_id'];
    $kategori = $row['kategori_ad'];
    $baslik = $row['baslik'];
    $sure = $row['sure'];
    $boyut = $row['boyut'];
    $kalori = $row['kalori'];
    $resim = $row['resim'];
    $url = $row['url'];
}
?>