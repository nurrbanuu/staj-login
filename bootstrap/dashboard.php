<?php 
include "baglan.php";
include "inc/altust/header.php";


?>
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





<?php include_once "inc/altust/footer.php"; ?>