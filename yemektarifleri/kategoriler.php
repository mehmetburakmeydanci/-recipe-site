<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kategori-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
    <div class="kategoriler">
            <h2 class="baslik-t8">
                <a class="card-baslik" href="">Kategoriler</a>
            </h2>
       
        <div class="kategoriler-items">
            <?php 
            require("database.php");

            $query = "SELECT * from kategoriler";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo "<a class='kategoriler-item' style='background-image: url(" . $row["kategori_img"] . ");' href='" . $row["kategori_url"] . "'>";        
                echo "<span>" . $row["kategori_ad"] . "</span>";        
                echo "</a>";        
                }
            }

            ?>                        
            </div>
        </div>
    </div>
</body>
</html>