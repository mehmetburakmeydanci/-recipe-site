<?php 

session_start();

include("database.php");

if (isset($_GET["tarif_id"])) {
    $tarif_id = $_GET["tarif_id"];

    if (isset($_SESSION["uye_id"])) {

        $uye_id = $_SESSION['uye_id'];
        include ("database.php");
        $sql = "SELECT * FROM uyeler where uye_id=$uye_id";
        $result = $conn->query($sql);
    
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $uye_id = $row['uye_id'];
            $ad = $row['ad'];
            $soyad = $row['soyad'];
            $kullanici_adi = $row['kullanici_adi'];

            $sql = "INSERT INTO favoriler(tarif_id, uye_id, kullanici_adi) VALUES ('$tarif_id','$uye_id','$kullanici_adi')";
            $conn->query($sql);


            $favarti = "UPDATE tarifler SET fav = fav +1 where tarif_id='$tarif_id'";
            if ($conn->query($favarti)== TRUE){
                header("Location: tarif.php?tarif_id=$tarif_id");
            }
        }
       
    }


}

$conn->close();
?>