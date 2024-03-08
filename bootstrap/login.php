
<?php 
session_start();
require "baglan.php";




if($_POST){
    
    $pass=$_POST["pass"];
    $remail=$_POST["remail"];

    if(!empty($_POST["pass"]) && !empty($_POST["remail"])){
        $control=$db->prepare("SELECT * FROM user WHERE pass=?  and remail=?");
        $control->execute(array($pass,$remail));
            if($control->rowcount()==1){
                $_SESSION["oturum"]=true;
                
                $_SESSION["remail"]=$remail;
                if ($_SESSION["oturum"] == true) { 
                    
                    header("refresh:1; url=http://localhost/bootstrap/dashboard.php?succes=login");
                }}else{
                    header("location:login.php?error=notuser"); 
                }
    }else{
        header("location:login.php?error=notnull");
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">









</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <?php 
                                        if(isset($_GET["error"])){
                                            echo '<div class="alert alert-danger"> ';
                                           if($_GET["error"]=="notuser"){
                                            echo "Email veya parolanız yanlış olabilir.";
                                           }  
                                          else if($_GET["error"]=="notnull"){
                                            echo "Boş alanları doldurunuz.";
                                           } 
                                           else if($_GET["error"]=="notnew"){
                                            echo "Zaten böyle bir kullanıcı var";
                                        } 
                                            echo '</div>';
                                        } 
                                        if(isset($_GET["success"])){
                                            echo '<div class="alert alert-success"> ';
                                            if($_GET["success"]=="enter"){
                                                echo "Kaydınız Oluşturuldu! Giriş Yapabilirsiniz! ";
                                            }else if($_GET["success"]=="login"){
                                                    echo "Başarıyla giriş Yapıldı! ";
                                            }echo '</div>';
                                        }
            
                                        
                                        ?>
                                        <h1 class="h4 text-gray-900 mb-4">HOŞ GELDİNİZ!</h1>
                                    </div>
                                    <form action="login.php"  method="post"  >
                                        <div class="form-group">
                                            <input type="email" name="remail" class="form-control form-control-user"
                                                aria-describedby="emailHelp"
                                                placeholder="Email Adresinizi Giriniz.....">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass"class="form-control form-control-user"
                                                 placeholder="Şifrenizi Giriniz....">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Beni Hatırla</label>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                                            Giriş Yap </button>
                                                
                                               
                                      
                                       
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-pass.php">Şifremi Unuttum?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Profil Oluştur!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>