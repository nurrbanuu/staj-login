
<?php 
include "baglan.php";
include "inc/altust/header.php";

?><div>
                        <h1 class="h3 mb-0 text-gray-800"> </h1>
                        
</div>
<div class="row">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xL h5 font-weight-bold text-info text-uppercase mb-1">
                                                SİPARİŞ LİSTESİ
                                            </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
     
      <th scope="col">ID</th>
      <th scope="col">Sipariş Numarası</th>
      <th scope="col">Müşteri Adı</th>
      <th scope="col">Sipariş Açıklaması</th>
      <th scope="col">İşlem</th>
    </tr>
  </thead>
  <tbody>
  <?php 
                                            $query = $db->query("SELECT  customer.ad_soyad, orders.s_id, orders.siparis_no, orders.s_aciklama
                                            FROM customer
                                            INNER JOIN orders ON customer.c_id = orders.c_id", PDO::FETCH_ASSOC);
                                                if ( $query->rowCount() ){
                                                     foreach( $query as $row ){ ?>
                                                <tr>
                                                 <th scope="row"><?php print $row['s_id'];?></th>
                                                <td><?= $row['siparis_no'];?></td>
                                                <td><?= $row['ad_soyad'];?></td>
                                               
                                                <td><?= $row['s_aciklama'];?></td>
                                                <td>
<button name="detay" type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal3<?php print $row['s_id'];?>">
  detay
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal3<?php print $row['s_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">SİPARİŞ DETAY SAYFASI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="order.php" method="POST">
        <input type="hidden" name="orderdetay" value="<?php print $row['s_id'];?>">
        
      </div> <?php include "o_detay.php";?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-success">güncelle</button>
       
      </div></form>
    </div>
  </div>
</div>
</td> 
                                                </tr><?php  } ?>
                                                <?php  } ?>
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