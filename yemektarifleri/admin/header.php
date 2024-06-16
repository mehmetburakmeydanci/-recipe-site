<?php 

?>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />

    <style>
      *{
        text-decoration: none;
        margin-bottom: !important;
        margin: 0;
      }
      p{
        margin-bottom: 0 !important;
      }
         header {
/*       
  background: hsla(298, 86%, 50%, 1);

background: linear-gradient(45deg, hsla(298, 86%, 50%, 1) 0%, hsla(290, 92%, 44%, 1) 28%, hsla(281, 97%, 38%, 1) 52%, hsla(269, 100%, 32%, 1) 74%, hsla(245, 99%, 29%, 1) 100%);

background: -moz-linear-gradient(45deg, hsla(298, 86%, 50%, 1) 0%, hsla(290, 92%, 44%, 1) 28%, hsla(281, 97%, 38%, 1) 52%, hsla(269, 100%, 32%, 1) 74%, hsla(245, 99%, 29%, 1) 100%);

background: -webkit-linear-gradient(45deg, hsla(298, 86%, 50%, 1) 0%, hsla(290, 92%, 44%, 1) 28%, hsla(281, 97%, 38%, 1) 52%, hsla(269, 100%, 32%, 1) 74%, hsla(245, 99%, 29%, 1) 100%);

filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#E512EB", endColorstr="#B309D5", GradientType=1 ); */
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.8rem;
      z-index: 9999;
      position: fixed;
      width: 100%;
      background-color: #161b22;
      border-bottom: 1px solid #ffffff0d;
    }
    .logo {
      font-size: 1.7rem;
      letter-spacing: 1px;
      font-weight: 700;
      color: #fff;
    }


    nav {
      display: flex;
      justify-content: flex-end;
    }

    nav span {
      cursor: pointer;
      color: #fff;
      text-decoration: none;
      font-size: 1rem;
      display: grid;
      align-content: center;
      padding: 5px;
      border-radius: 10px;
      font-weight: 500;
      background-color: #fafafa00;
      text-transform: capitalize;
    }
    nav span:hover{
      
      background-color: #fafafa1c;
    }
    nav i{
      display: grid !important;
      align-content: center;
    }

    span img{
        height: 35px;
        border-radius: 100%;
    }
    .logout-form{
      display:grid;
      align-content:center;
      border-top: 1px solid #00000026;
      padding: 7px;
      opacity: 0.7;
      margin-top: 15px;
      
    }
    .logout-form:hover{
      background-color: #9696962b; 
      opacity: 1;
    }
    .logout{
      background-color: transparent;
      border: none;
      color: #000;
      font-size: 16px;
      cursor: pointer;
      display: flex;
      gap: 10px;
      align-items: center;
      font-weight: 500;
    }
    .logout-sidebar{
      font-weight: 700;
    }
    header a{
        color: #fff;
        display: flex;
        gap: 11px;
      }
      .logo:hover{
  
      }
      .fa-angle-up{
        transform: scaley(-1);
      }
      .ul{
        display: none;
        position: absolute;
        top: 65px;
        right: 8px;
        color: #fff;
        list-style-type: none;
        background-color: rgb(22 27 34);
        opacity: 1;
        padding: 10px;
        z-index: 1;
        max-width: 100%;
        border-radius: 10px;
        width: 210px;
        box-shadow: 0px 0px 30px -3px rgba(0,0,0,0.1);
       
      }
      .a-menu{
        display: flex;
        gap: 10px;
      }
      .menu-li_item{
        padding: 6px;
        margin-bottom: 3px;
        font-size: 17px;
        opacity: 0.7;
        height: 45px;
        display: flex;
        align-content: center;
        flex-wrap: wrap;
        font-weight: 500;
        
        }
      .menu-li_item:hover{
        background-color: #9696962b;
        color: #fff;
        opacity: 1;
      }
      .pph{
      width: 50px;
      height: 50px;
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 50%;
      background-position: center;
    }
    .fa-badge-check{
      color: #00ea1b;
    }
    
    *{
        box-sizing: border-box;
        
    }
    a{
      text-decoration: none;
    }
    p{
      margin: 0;
      padding: 0;
    }
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: #0d1118;
  color: #fff;
  
}



div.content {
  margin-left: 0px;
  height: 1000px;
  margin: 0px 20px;
  padding-top: 100px !important;
}
@media (min-width: 700px) { div.content{
  margin-left: 290px !important;

    }}


.table{
  width: 100%;
  color: #fff;
  border: none;
}
  
thead{
    border-bottom: 2px solid #ffffff17;
}

.table-div{
        overflow-x: auto;
        border-radius: 13px;
        border: 1px solid #81818136;
        text-align: center; 

    }
    ::-webkit-scrollbar {
    width: 10px;
    height: 8px;
    }

    ::-webkit-scrollbar-track {
    background-color: #000000;
    }

    ::-webkit-scrollbar-thumb {
    background-color: #ffffff2d;
    border-radius: 5px;
    }
    th img{
      width: 50px;
      height: 50px;
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 50%;
      background-position: center;
    }
    tr{
        border-bottom: 1px solid #90909082;
    }

    td a{
      background-color: red;
      height: 25px;
      width: 50px;
      display: inline-grid;
      align-items: center;
      justify-content: center;
      border-radius: 5px;
    }
    td a:hover{
      opacity: 1;
    }
    td a i{
      color: #fff;
      
    }

    #deleted{
        display: grid;
        justify-content: center;
        width: calc(100% - 140px);
        position: fixed;
        margin-top: 25px;
    }
    #edited{
        display: grid;
        justify-content: center;
        width: calc(100% - 140px);
        position: fixed;
        margin-top: 25px;
    }
    .actions{
      display: flex;
      margin-right: 5px;
    }
    #edit{
      background-color: #F1AC00;;
    }
    #menutoggle2{
      cursor: pointer;
      display: grid;
      align-items: center;
    }
    @media (min-width: 700px){#menutoggle2{
      display: none;
    }}
    .sidebar {
  margin: 0;
  padding: 0;
  background-color: #161b22;
  position: fixed;
  overflow: auto;
  font-weight: 600;
  margin-top: 85px;
}


.sidebar a {
  display: block;
  color: #fff;
  padding: 16px;
  text-decoration: none;
  border-left: 5px solid rgba(255, 0, 0, 0);
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
    #db-button{
      background-color:transparent;
      color:#fff;
      border:none;
      font-size:25px;
    }
    .dark-mode {
      background-color: #fbfcff!important;
      color: rgba(0, 0, 0, 0.923)!important; 
      
    }
    .dark-mode header{
      background-color: #fff;
      border-bottom: 1px solid #00000026;
    }
    .dark-mode .d-card_item{
      background-color: #fafafa;
      
    }
    .dark-mode .table{
      color: #0d1118 !important; 
    }
    .dark-mode .logo{
      color: #0d1118 !important; 
    }
    .dark-mode .a-menu{
      color: #161b22;
    }
    .dark-mode #icon{
      color: #161b22;
    }
    thead{
      background-color: #fff ; 
      color: #0d1118; 
    }
    .dark-mode thead{
      background-color: #0d1118 ; 
      color: #fff; 
    }

    .dark-mode button{
        color: white;
    }
    .dark-mode .sidebar-left{
      background-color: #fff;
      box-shadow: 0px 0px 50px -12px rgba(0,0,0,0.1);
    }
    .dark-mode .sidebar-left a{
      color: #161b22;
    }
    .dark-mode .sidebar-left a:hover{
      color: #161b22;
      background-color: #efefef;
    }
    .dark-mode .logout-sidebar{
      color: #161b22;
    }
    .dark-mode .logout-sidebar i{
      color: #161b22;
    }
    .dark-mode #menutoggle2{
      color: #161b22;
    }
    
    .dark-mode input{
      color:#161b22 !important;
    }
    .logo__img{
      height: 60px;
    }

    </style>
</head>
<header>
        <a href="dashboard"><h2 class="logo"><img class="logo__img" src="uploads/yemeksehri.png" alt=""> Yemek Tarifleri - Admin</h1></a>

         
         
    <div style="display:flex; gap: 2em;}">

          <nav>
          <span href="" class="menu-toggle">
              <div class="a-menu">
                <img id="previeww" onerror="this.src='uploads/bos.png';" class="pph" src="" alt="">
                <p style="display: grid; align-content: center;"><?php echo $admin_ad; ?> <?php echo $admin_soyad; ?></p>
                <i class="fa-solid fa-angle-up"></i>
              </div>
      
          </span>
    
      
          <ul class="ul">
          <li><a class="menu-li_item" href="user/zargex"><i class="fa-regular fa-user"></i></i>Profil</a></li>
          <li><a class="menu-li_item" href="accountinfo"><i class="fa-sharp fa-regular fa-circle-info"></i></i>Kullanıcı Bilgileri</a></li>
          <li><a class="menu-li_item" href="#"><i class="fa-regular fa-bell"></i></i>Bildirimler</a></li>
          <li><a class="menu-li_item" href="#"><i class="fa-sharp fa-regular fa-gear"></i></i>Ayarlar</a></li>
          <li>
          <form class="logout-form" method="post">
            <button class="logout" type="submit" name="logout" ><i class="fa-regular fa-right-from-bracket"></i> Log out</button>
          </form>
          </li>
        </ul>
        </nav>
          <span id="menutoggle2">
          <i style="font-size: 25px;" class="fa-solid fa-bars"></i>
          </span>
          <button id="db-button" onclick="changeColor()">
    <i id="icon" class="fa fa-sun-o" aria-hidden="true"></i>
  </button>
    </div>


      </header>
      <aside class="sidebar">
        <a class="active" href="dashboard.php"><i class="fas fa-chart-pie"></i> Veriler</a>
        <a href="users.php"><i class="fas fa-users"></i> Kullanıcılar</a>
        <a class="logout" href="#about"><i class="fa-solid fa-right-from-bracket"></i> Çıkış</a>
        </aside>

      <script>
//dark mod kodları

var element = document.body;
var icon = document.getElementById("icon");

// Set the selected mode on page load
if (localStorage.getItem("mode") === "dark") {
  element.classList.add("dark-mode");
  icon.classList.remove("fa-sun-o");
  icon.classList.add("fa-moon-o");
}

// Save the selected mode on change
function changeColor() {
  element.classList.toggle("dark-mode");
  if (element.classList.contains("dark-mode")) {
    localStorage.setItem("mode", "dark");
    icon.classList.remove("fa-sun-o");
    icon.classList.add("fa-moon-o");
  } else {
    localStorage.setItem("mode", "light");
    icon.classList.remove("fa-moon-o");
    icon.classList.add("fa-sun-o");
  }
}






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
      
<script>
const menuToggle = document.querySelector('.menu-toggle');
const ul = document.querySelector('.ul');
const angleUpIcon = document.querySelector('.fa-angle-up');



menuToggle.addEventListener('click', function() {
  ul.style.display = ul.style.display === 'block' ? 'none' : 'block';
  
});

document.addEventListener('click', function(event) {
  if (!ul.contains(event.target) && !menuToggle.contains(event.target)) {
    ul.style.display = 'none';
    
  }
});

</script>