<?php
session_start();

if (!isset($_SESSION['uye_id'])){
  header("Location: index.php");
  exit();
}
include_once("db/db-connection.php");

$uye_id = $_SESSION['uye_id'];

$sql = "SELECT * FROM admin WHERE uye_id='$uye_id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $admin_ad = $row['admin_ad'];
    $admin_soyad = $row['admin_soyad'];
    $admin_kullanici_adi = $row['admin_kullanici_adi'];
    $uye_pp = $row['uye_pp'];

}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="admin-style.css">
  <link rel="stylesheet" href="media.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  *{
    font-family: 'Poppins', sans-serif
  }

    .content{
      padding: 0px 20px;
      margin: 0 !important;
    }
    #delete i,#edit i{
      display: grid !important;
    }
</style>
</head>
<body>
  <!-- header -->
   <?php require 'header.php'; ?>
   <?php require 'sidebar-left.php'; ?>

   <div class="containerx">

      <!-- sidebar -->
   
      <div class="content media">
            


            <div id="deleted">
              
              <?php if(isset($_GET['deleted'])) { 
                ?>
                <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Kullanıcı Silindi</p>
              <?php 
            } ?>


            </div>
            <div id="edited">
              <?php if(isset($_GET['edited'])) { ?>
                <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Kullanıcı Düzenlendi</p>
              <?php } ?>
              </div>
              <br><h1><b>Kayıtlı Kullanıcılar</b></h1><br>
              <div class="table-div">
                  <table class="table">
                      <thead>
                      <tr>
                          <th  scope="col">ID</th>
                          <th scope="col">Ad</th>
                          <th scope="col">Soyad</th>
                          <th scope="col">Kullanıcı adı</th>
                          <th scope="col">Kullanıcı Durumu</th>
                          <th scope="col">Seçenekler</th>

                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      include("db/db-connection.php");

                      $sql = "SELECT * FROM uyeler";
                      $result = $conn->query($sql);

                      if(!$result) {
                          die("Invalid query: " . $conn->error);
                      }

                          while ($row = $result->fetch_assoc()) {
                            

                          echo"
                          <tr>
                              <td>" . $row['uye_id'] . "</td>
                              <td>" . $row['ad'] . "</td>
                              <td>" . $row['soyad'] . "</td>
                              <td>" . $row['kullanici_adi'] . "</td>
                              <td>Üye</td>
                              <td>
                              <a id='delete' href='delete.php?uye_id=" . $row['uye_id'] . "'><i class='fa-solid fa-trash-can-xmark'></i></a>
                              <a id='edit' href='edit.php?uye_id=" . $row['uye_id'] . "'><i class='fa-solid fa-pen-to-square'></i></a>
                              </td><script></script>
                              

                          </tr>
                          ";
                          }                
                      
                      ?>

                      </tbody>
                  </table>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</html>