<head>
<link rel="stylesheet" href="bloglar-style.css">
<style>
    img{
        height:200px;
    }
</style>
</head>

<?php
include("db/db-connection.php");

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    // Veritabanından belirli URL'ye sahip blogyi al
    $query = "SELECT * FROM bloglar WHERE url=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $url);
    $stmt->execute();
    $result = $stmt->get_result();

    // blogyi görüntüle
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<img  src='" . $row["img"] . "' alt='" . $row["baslik"] . "'><br>";
        echo "<h1>" . $row["baslik"] . "</h1>";
        echo "<p>Yazar: " . $row["yazar"] . "</p>";
        echo "<p>Tarih: " . $row["tarih"] . "</p>";
        echo "<p>" . $row["icerik"] . "</p>";
    } else {
        echo "blog bulunamadı.";
    }
} else {
    echo "blog URL'si belirtilmedi.";
}

mysqli_close($conn);
?>
