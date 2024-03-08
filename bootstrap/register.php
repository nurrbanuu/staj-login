
<?php

require "baglan.php";

if($_POST){
    $ad=$_POST["fname"];
    $soyad=$_POST["lname"];
    $pass=$_POST["pass"];
    $repass=$_POST["repass"];
    $remail=$_POST["remail"];

    if(isset($_POST["pass"]) && isset($_POST["remail"])){
        $control=$db->prepare("SELECT * FROM user WHERE pass=?  and remail=?");
        $control->execute(array($pass,$remail));
            if($control->rowcount()==0){
                if($pass==$repass){
                    $query = $db->prepare("INSERT INTO user SET ad=? ,soyad=? ,remail=?, pass=? ,repass=?");
                    $insert = $query->execute(array( $ad,$soyad,$remail,$pass,$repass));
                    
                    header("refresh:2; url=http://localhost/bootstrap/login.php?success=enter");
                }else{
                    header("location:register.php?error=notpass");
                }
    }else{
        
        header("location:login.php?error=notnew");
    }
}}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                            <?php 
                            if(isset($_GET["error"])){
                              echo '<div class="alert alert-danger"> ';
                            if($_GET["error"]=="notpass"){
                            echo "Girdiğiniz Şifreler Uyuşmuyor !";
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
                                }echo '</div>';
                            }

                                        
                                        
                                        
                                        
                                        
                            ?>


                                <h1 class="h4 text-gray-900 mb-4">Profil Oluştur!</h1>
                            </div>
                            <form class="user" action="register.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Ad">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname"class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Soyad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="remail" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Adresiniz">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="pass" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Şifre Giriniz....">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repass" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Tekrar Şifre Giriniz.....">
                                    </div>
                                </div>
                                <input type="submit"  class="btn btn-primary btn-user btn-block" 
                                   value="Kaydol" >
                              
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-pass.php">Şifremi Unuttum?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Zaten bir profilin var mı? O zaman giriş yap!</a>
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