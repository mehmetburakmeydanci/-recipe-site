
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="sidebar-left-style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<aside class="sidebar-left">
  <ul style="    gap: 6px;
    display: grid;">
        <li>
          <a class="sidebar-menu-item" href="dashboard.php"><i class="fas fa-chart-pie"></i> Veriler</a>
        </li>

        <li id="sidebarmenuli">
          <a class="sidebar-menu-item dropdownz" href="#"><i class="fas fa-user-cog"></i></i> Kullanıcı Yönetimi<i class="fas fa-angle-right"></i></a>
          <ul class="dropdownz_menu">
            <li><a class="sidebar-menu-item children " href="users.php"><i class="fas fa-users"></i> Kullanıcılar</a></li>
          </ul>
        </li>



        <li id="">
          <a class="sidebar-menu-item dropdownz" href="#"><i class="fas fa-feather-alt"></i></i> İçerik Yönetimi<i class="fas fa-angle-right"></i></a>
          <ul class="dropdownz_menu">
            <li><a class="sidebar-menu-item children " href="tarifler.php"><i class="fas fa-eye"></i> Tarifler</a></li>
            <li><a class="sidebar-menu-item children " href="tarif-olustur.php"><i class="fas fa-plus"></i> Tarif Oluştur</a></li>
          </ul>
        </li>





     
        <form method="post">
            <button class="logout-sidebar" type="submit" name="logout" ><i class="fa-regular fa-right-from-bracket"></i> Çıkış</button>
        </form>   
    </ul>     
</aside>
</body>
<script>
  var dropdownz = document.getElementsByClassName("dropdownz");
  var sidebarmenuli = document.getElementById("sidebarmenuli");

  var i;

  for (i = 0; i < dropdownz.length; i++) {
    dropdownz[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownz_menu = this.nextElementSibling;
      if (dropdownz_menu.style.maxHeight) {
        dropdownz_menu.style.maxHeight = null;
      } else {
        dropdownz_menu.style.maxHeight = dropdownz_menu.scrollHeight + "px";

        sidebarmenuli.style.borderRadius = "8px";
      }
    });
  }

  
</script>

</html>