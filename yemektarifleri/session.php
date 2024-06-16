<?php 

if (isset($_SESSION["uye_id"])) {

    $uye_id = $_SESSION['uye_id'];
    include ("database.php");
   
} else {
    header("Location: giris.php");
}

?>