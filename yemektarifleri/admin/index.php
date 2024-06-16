<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css" integrity="your-integrity-hash" crossorigin="anonymous" />
	<link rel="stylesheet" href="../assets/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .login-signup2 {
            background-color: #fff;
            border: none;
            padding: 10px;
            color: #000000;
            font-weight: 700;
            border-radius: 8px 8px 0px 0px;
            width: 100%;
            max-width: 360px;
            height: 50px;
        }
        .login-bg{
            background: #799AB0;
            background: radial-gradient(at center, #799AB0, #2931D6);
        }
    </style>
</head>
<body>
<div class=" login-bg">
					
                    <div class="cards">
                        <div class="trns">
                            <button type="button" class="login-signup2 ls3">GİRİŞ YAP</button>
                        </div>
                        <div class="cards2">
                            <div class="login-form card card1 active">
                                
                                <form method="POST" action="db/adminlogin-db.php">
                                <i style="color: #000;" class="fa-regular fa-user-gear"></i>
                                    <h1>Admin Giriş</h1>


            
                                
            
                                    <input class="email1" name="admin_kullanici_adi" type="text" id="email1" placeholder="Kullanıcı Adınız" required>
            
                                    
                                    <input name="sifre" type="password" minlength="8" id="myInput"  class="password1"  required placeholder="Şifreniz">
                                    <div class="chechbox">
                                        <label for="chechbox">
                                            <input id="chechbox" type="checkbox" onclick="pass_hide()">
                                            Şifreyi Göster
                                        </label>
                                        <?php if(isset($_GET['login_error'])) { ?>
                                        <p style="margin: 10px 0px; align-items: center;display: grid; color:#721c24; background-color:#f8d7da; padding:10px; border-radius border: 1px solid #f5c6cb; ">Hatalı giriş bilgileri</p>
            
                                        <?php } ?>
                                    
                                        <?php if(isset($_GET['messageSent'])) { ?>
                                            <p style="margin: 10px 0px; align-items: center;display: grid; color:#155724; background-color:#d4edda; padding:10px; border-radius: 4px; border: 1px solid #c3e6cb; ">Hesap Oluşturuldu, giriş yapabilirsiniz.</p>
                                        <?php } ?>
            
                                        <?php if(isset($_GET['signup_error'])) { ?>
                                            <p style="margin: 10px 0px; align-items: center;display: grid; color:#856404; background-color:#fff3cd; padding:10px; border-radius: 4px; border: 1px solid #ffeeba; ">E-posta zaten kayıtlı.</p>
                                        <?php } ?>
            
                                        <?php if(isset($_GET['username_error'])) { ?>
                                            <p style="margin: 10px 0px; align-items: center;display: grid; color:#856404; background-color:#fff3cd; padding:10px; border-radius: 4px; border: 1px solid #ffeeba; ">Kullanıcı Adı zaten kayıtlı.</p>
                                        <?php } ?>
            
                                        <?php if(isset($_GET['account_none'])) { ?>
                                            <p style="margin: 10px 0px; align-items: center;display: grid; color:#856404; background-color:#fff3cd; padding:10px; border-radius: 4px; border: 1px solid #ffeeba; ">Bu E-postaya ait bir hesap bulunamadı</p>
                                        <?php } ?>
                                            
                                        
                
                
                                    </div>
                                    <button class="form-button">GİRİŞ</button>
            
                                </form>
                            </div>
                            
              
                        </div>
                    </div>
                    
                </div>
</body>
<script>
function pass_hide() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>