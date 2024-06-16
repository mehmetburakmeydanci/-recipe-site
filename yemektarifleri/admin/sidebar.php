<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .sidebar {
  margin: 0;
  padding: 0;
  background-color: #161b22;
  position: fixed;  
  overflow: auto;
  transition: 0.2s ease-out;
  font-weight: 600;
  margin-top: 85px;
}


.sidebar a {
  display: block;
  color: #fff;
  padding: 16px;
  text-decoration: none;
  border-left: 5px solid rgba(255, 0, 0, 0);
  transition: 0.3s;
}

.sidebar a:hover{
  
}
 
.sidebar a:active {
  background:  #ffffff0a;
  color: white;
}

.sidebar a:hover{
  background-color: #ffffff1a;
  color: rgb(255, 255, 255);
}
.logout{
        position: absolute;
        bottom: 95px;
        width: 100%;
    }
    a i{
    margin-right: 4px;
}
.active{
    display: none;
}
.sidebar:hover .active {
display: block;
}
a{
      text-decoration: none;
    }

    </style>
</head>
<header>
    <nav>
        <nav>
            <span id="menutoggle2">
                <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
            </span>
        </nav>
    </nav>
</header>
<body>
<aside class="sidebar">
        <a class="active" href="dashboard.php"><i class="fas fa-chart-pie"></i> Veriler</a>
        <a href="users.php"><i class="fas fa-users"></i> Kullanıcılarqweqwe</a>
        <a class="logout" href="#about"><i class="fa-solid fa-right-from-bracket"></i> Çıkış</a>
        </aside>
</body>
<script>

const menuToggle = document.getElementById('menutoggle2');
const sidebar = document.querySelector('.sidebar');

    sidebar.style.height = '0';
    sidebar.style.width = '100%';

    menuToggle.addEventListener('click', () => {
    if (sidebar.style.height === '100%') {
        sidebar.style.height = '0';
        sidebar.style.width = '100%';
    } else {
        sidebar.style.height = '100%';
        sidebar.style.width = '100%';
    }
    });

</script>
</html>