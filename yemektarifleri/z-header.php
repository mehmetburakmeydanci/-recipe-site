
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="z-style.css">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
  <style>
        .hidden {
            display: none;
        }
        .header_1{
          display:flex;
        }
        .h-kategoriler_btn{
          transition: all 200ms;
        }
        .btn_hidden{
          background-color:#d21a6a;
          transform: scale(1.05);
          
        }
        header{
          display:block !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="header_1">
        <div class="logo">
            <a href="./">
            <img src="<?php echo $logo ?>" alt="">
            <span><?php echo $site_adi ?></span>
            </a>
          </div>
          <button class="h-kategoriler_btn" id="header-kategoriler"><i class="fas fa-list-ul"></i> Kategoriler</button>

          <div class="search-bar">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Tarif Ara...">
                <button type="submit"><i class="fas fa-search"></i></button>    
            </form>
        </div>
          <div class="user">
            <div><a class="fav" href="favoriler.php?uye_id=<?php echo $uye_id ?>">Favori Tarifler </a></div>
            <div><a class="fav" href="dolap.php?uye_id=<?php echo $uye_id ?>">Dolap </a></div>
            <div class="profile">
              <a href="user.php?uye_id=<?php echo $uye_id ?>">
                <i class="fas fa-user-circle"></i>  
              </a>
            </div>
            <a href="die.php">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          
          </div>
        </div>

        <div class="header_2">
            
            <div id="cate" class="hidden">
               <div class="kategoriler">

       
                          <div class="kategoriler-items">
                              <?php 
                              require("database.php");

                              $query = "SELECT * from kategoriler LIMIT 15";
                              $result = mysqli_query($conn,$query);
                              if(mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                  echo "<a class='kategoriler-item' style='background-image: url(" . $row["kategori_img"] . ");' href='kategori.php?kategori=" . $row["kategori_url"] . "'>";        
                                  echo "<span>" . $row["kategori_ad"] . "</span>";        
                                  echo "</a>";        
                                  }
                              }

                              ?>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script>

document.getElementById("header-kategoriler").addEventListener("click", function () {
    var cate = document.getElementById("cate");
    var headerkategorilerbtn = document.getElementById("header-kategoriler");
    headerkategorilerbtn.classList.remove("btn_hidden");
    if (cate.classList.contains("hidden")) {
      cate.classList.remove("hidden");
      headerkategorilerbtn.classList.add("btn_hidden");
    } else {
      cate.classList.add("hidden");
      headerkategorilerbtn.classList.remove("btn_hidden");

    }
});
</script>
</body>
</html>
