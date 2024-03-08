

<?php
include "baglan.php";                                       
                    if($_POST){
                        $ad_soyad=$_POST["ad_soyad"];
                        $email=$_POST["email"];
                        $tel_no=$_POST["tel_no"];
                        $kurum_adi=$_POST["kurum_adi"];
                        $unvan=$_POST["unvan"];
                        $m_adres=$_POST["m_adres"];
                        $adresbasligi=$_POST["adresbasligi"];

                        if(isset($_POST["ad_soyad"]) && !empty($_POST["ad_soyad"])){

 if(isset($_POST["ekle"])){
    $sql = "INSERT INTO customer (ad_soyad, email, tel_no, kurum_adi, unvan, m_adres, adresbasligi) 
    VALUES (:ad_soyad, :email, :tel_no, :kurum_adi, :unvan, :m_adres, :adresbasligi)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':ad_soyad', $ad_soyad);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel_no', $tel_no);
    $stmt->bindParam(':kurum_adi', $kurum_adi);
    $stmt->bindParam(':unvan', $unvan);
    $stmt->bindParam(':m_adres', $m_adres);
    $stmt->bindParam(':adresbasligi', $adresbasligi);
    if ($stmt->execute()) {
        echo "Müşteri başarıyla eklendi.";
        header("location:customer.php?islem=eklendi");
                            }else {
                                echo "ekle gelmiyor";
                            }
                          
                        }else {
                            echo '<div class="alert alert-danger"> ';
                            echo "ad soyad boş bırakılamaz";
                            echo '</div>';
                        }
                        
                    }}
?>
<div class="row">
                        <!-- düzen -->
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                    <div>
                                        <form action="customer.php"  method="POST"  >
                                        <input type="hidden" name="c_id" class="form-control form-control-user"
                                                value="">
                                        <div class="form-group">
                                            <input type="text" name="ad_soyad" class="form-control form-control-user"
                                                placeholder="Ad Soyad ">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                aria-describedby="emailHelp"
                                                placeholder="Email ">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tel_no" class="form-control form-control-user"
                                                placeholder="0(5--) --- -- -- ">
                                        </div> 
                                        <div class="form-group">
                                            <input type="text" name="kurum_adi" class="form-control form-control-user"
                                                placeholder="Kurum Bilgileri">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="unvan" class="form-control form-control-user"
                                                placeholder="Ünvan">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="adresbasligi" class="form-control form-control-user"
                                                placeholder="Adres Başlığı">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="m_adres" class="form-control form-control-user"
                                                placeholder="Adres">
                                        </div>
                                        
                                        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">kapat</button>
        <button type="submit" name="ekle" class="btn btn-success">ekle</button>
        
    </div>
                                          
                                          
                                        </form>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> 