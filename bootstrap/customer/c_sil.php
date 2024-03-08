<?php
include "baglan.php";                                  
                    if($_POST){
                        /*$ad_soyad=$_POST["ad_soyad"];
                        $email=$_POST["email"];
                        $tel_no=$_POST["tel_no"];
                        $kurum_adi=$_POST["kurum_adi"];
                        $unvan=$_POST["unvan"];*/
                        
                        

                        if(isset($_POST["dataDelete"])){
                            $query = $db->prepare("DELETE FROM customer WHERE `customer`.`c_id` = ?" );
                            $query->execute(array($_POST["dataDelete"])
                            
                            );
                          
                            //header("location:customer.php?islem=silindi");
                        }
                    }
?>
