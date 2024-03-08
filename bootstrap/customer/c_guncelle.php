<?php 
include "baglan.php";

if ($_POST) {
    
    $ad_soyad = $_POST["ad_soyad"];
    $email = $_POST["email"];
    $tel_no = $_POST["tel_no"];
    $kurum_adi = $_POST["kurum_adi"];
    $unvan = $_POST["unvan"];

    // Güncellenmek istenen müşterinin ID'si
    $c_id_to_update = isset($_POST['c_id']) ? $_POST['c_id'] : null;

    // Eğer güncellenmek istenen müşteri ID'si belirtilmemişse veya geçersizse
    if ($c_id_to_update === null) {
        echo "Müşteri bilgileri bulunamadı.";
    } else {
        $sql_select_customer = "SELECT * FROM customer WHERE c_id = :c_id";
        $stmt_select_customer = $db->prepare($sql_select_customer);
        $stmt_select_customer->bindParam(':c_id', $c_id_to_update);
        $stmt_select_customer->execute();
        $customer = $stmt_select_customer->fetch(PDO::FETCH_ASSOC);

       
        if ($customer) {
            $sql_update_customer = "UPDATE customer SET ad_soyad = :ad_soyad, email = :email, tel_no = :tel_no, kurum_adi = :kurum_adi, unvan = :unvan WHERE c_id = :c_id";
            $stmt_update_customer = $db->prepare($sql_update_customer);
            $stmt_update_customer->bindParam(':ad_soyad', $ad_soyad);
            $stmt_update_customer->bindParam(':email', $email);
            $stmt_update_customer->bindParam(':tel_no', $tel_no);
            $stmt_update_customer->bindParam(':kurum_adi', $kurum_adi);
            $stmt_update_customer->bindParam(':unvan', $unvan);
            $stmt_update_customer->bindParam(':c_id', $c_id_to_update);

            if ($stmt_update_customer->execute()) {
                header("location:customer.php?islem=güncellendi");
            } else {
                echo '<div class="alert alert-danger"> ';
                echo "Müşteri bilgileri güncellenirken bir hata oluştu.";
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-danger"> ';
            echo "Müşteri bulunamadı.";
            echo '</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger"> ';
    echo "Post verisi bulunamadı.";
    echo '</div>';
}
?> 
                   
                   <div class="row">
                

                        <!-- düzen -->
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-300 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                    <div>
                                    <form action="customer.php" method="post"  >
                                <input type="hidden" name="id" value="<?=$row["c_id"];?>">
                                
                                <div class="form-group">
                                    <input type="text" name="ad_soyad" class="form-control form-control-user"
                                        placeholder="Ad Soyad " value="<?=$row["ad_soyad"];?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        aria-describedby="emailHelp"
                                        placeholder="Email" value="<?=$row["email"];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tel_no" class="form-control form-control-user"
                                        placeholder="0(5--) --- -- -- " value="<?=$row["tel_no"];?> ">
                                </div> 
                                <div class="form-group">
                                    <input type="text" name="kurum_adi" class="form-control form-control-user"
                                        placeholder="Kurum Bilgileri" value="<?=$row["kurum_adi"];?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="unvan" class="form-control form-control-user"
                                        placeholder="Ünvan" value="<?=$row["unvan"];?>">
                                </div>
                                <div class="form-group">
                                            <input type="text" name="m_adres" class="form-control form-control-user"
                                                placeholder="Adres" value="<?=$row["m_adres"];?>">
                                        </div> 
                                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-outline-warning">düzenle</button>
      
      <input type="hidden" name="update" value="1002">
      </div> </form>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>        
            
  

                    


                    


            
           