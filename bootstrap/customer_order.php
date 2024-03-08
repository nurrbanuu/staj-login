
<?php 
include "baglan.php";
include "inc/altust/header.php";

?><div>
                        <h1 class="h3 mb-0 text-gray-800"> </h1>
                        
</div>
<div class="row">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xL h5 font-weight-bold text-secondary text-uppercase mb-1">
                                                SİPARİŞLERİM SAYFASINA HOŞ GELDİNİZ
                                            </div>
<table class="table">
  <thead>
    <tr class="bg-warning">
      <th scope="col">#</th>
      <th scope="col">Müşteri AD</th>
      <th scope="col">Sipariş Adedi</th>
      <th scope="col">Sipariş NO</th>
      <th scope="col">Sipariş Açıklaması</th>
      <th scope="col">Sipariş Durumu</th>
    </tr>
  </thead>
  <tbody>
<?php 

  $sql="SELECT  orders.s_id, customer.ad_soyad, orders.s_adet, orders.siparis_no, orders.s_aciklama, orders.s_durum
  FROM customer
  LEFT JOIN orders ON customer.c_id = orders.c_id where orders.c_id=:c_id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':c_id', $c_id, PDO::PARAM_INT);
  if($stmt->execute()){
    
    if ($stmt->rowCount() > 0){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
            

            
?>
                                                <tr>
                                                <th scope="row"><input type="hidden" name="c_id" 
                                                value="<?=$row["c_id"];?>"><?=$row["s_id"];?></th>   
                                                <th ><?= $row['ad_soyad'];?></th>
                                                <td><?php print $row['s_adet'];?></td>
                                                <td><?= $row['siparis_no'];?></td>
                                                <td><?= $row['s_aciklama'];?></td>
                                                <td><?= $row['s_durum'];?></td>
                                               
                                                </tr><?php  } ?>
                       <?php  } 
                              else {
                              echo '<div class="alert alert-danger"> ';
                              echo "Müşteriye ait sipariş bulunamadı.";
                              echo '<div> ';
                                  } 
                      }
                        else {
                           echo "Sorgu çalıştırılırken bir hata oluştu.";
                           print_r($stmt->errorInfo());
                             }  ?>
  </tbody>
</table>
</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
               
                    </div>
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php include "inc/altust/footer.php";?>          