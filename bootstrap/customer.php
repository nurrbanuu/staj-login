<?php 
include "baglan.php";
include "inc/altust/header.php";

?>
 <!-- Page Heading -->
 <div>
                        <h1 class="h3 mb-0 text-gray-800"> MÜŞTERİLER</h1>
                        
</div>
<div></div>
<div class="row">
<div class="col-xl col-md-6 mb-4">
<button name="ekle" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
  Yeni Müşteri Eklemek İçin Tıklayınız !
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">MÜŞTERİ | EKLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php include "customer/c_ekle.php";?>
        
    </div>

  </div>
</div>
</div>
</div>
</div>
                           
                        <!-- liste -->
                        <div class="row">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xL h5 font-weight-bold text-success text-uppercase mb-1">
                                                MÜŞTERİ LİSTESİ
                        <?php 
                                if(isset($_GET["islem"])){
                               
                                if($_GET["islem"]=="eklendi"){
                                  echo '<div class="alert alert-success"> ';
                                    echo "Müşteri başarıyla listeye eklendi! ";
                                    echo '</div>';
                                }else {
                                  if($_GET["islem"]=="silindi"){
                                    echo '<div class="alert alert-danger"> ';
                                      echo "Müşteri başarıyla listeden silindi! ";
                                      echo '</div>';
                                }else{
                                  if($_GET["islem"]=="güncellendi"){
                                    echo '<div class="alert alert-warning"> ';
                                      echo "Müşteri bilgileri başarıyla güncellendi! ";
                                      echo '</div>';
                                  }
                                }
                                }
                               
                                
                                }
                        ?> 
                                            </div>
                                            <div>
                       
                                            <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">AD SOYAD</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col">TELEFON NO</th>
                                                <th scope="col">KURUM ADI</th>
                                                <th scope="col">ÜNVAN</th>
                                                <th scope="col">ADRES</th>
                                                <th scope="col">İŞLEM</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php 
                                            $query = $db->query("SELECT `c_id`, `ad_soyad`, `email`, `tel_no`, `kurum_adi`, `unvan` ,
                                            `m_adres`,`adresbasligi`,`m_adres2`,`adresbasligi2`,`m_adres3`,`adresbasligi3`
                                            FROM `customer`", PDO::FETCH_ASSOC);
                                                if ( $query->rowCount() ){
                                                     foreach( $query as $row ){ ?>
                                            <tr>
                                                <th scope="row"><?php print $row['c_id'];?></th>
                                                <td><form action="customer_order.php" method="GET"> <input type="hidden" name="id" value="<?php print $row['c_id'];?>">
                                                <a class="item" href="customer_order.php?id=<?php print $row['c_id'];?> " ><button type="submit">
                                                <?= $row['ad_soyad'];?></button></a></form></td>
                                                <td><?=$row['email'];?></td>
                                                <td><?php echo "0-5";?><?= $row['tel_no'];?></td>
                                                <td><?php echo $row['kurum_adi'];?></td>
                                                <td><?= $row['unvan'];?></td>
                                                <td><?= $row['adresbasligi'];?><br><?= $row['m_adres'];?></td>
                                                <td> 
<button name="sil" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal<?php print $row['c_id'];?>">
  sil 
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?php print $row['c_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MÜŞTERİ | SİL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
        <input type="hidden" name="dataDelete" value="<?php print $row['c_id'];?>">
        <p> <h2> <?= $row['ad_soyad'];?> </h2> isimli müşteriyi silmek istediğinize emin misiniz ?</p>
        <?php include "customer/c_sil.php";?>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">kapat</button>
        <button type="submit"  class="btn btn-danger">sil</button>
        
    </div></form>
    </div>
  </div>
</div>
                                             
<button name="düzenle" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal1<?php print $row['c_id'];?>">
  düzenle
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal1<?php print $row['c_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">MÜŞTERİ | DÜZENLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php include "customer/c_guncelle.php";?>
      </div>
      
    </div>
  </div>
</div>

<button name="detay" type="button" class="btn " data-toggle="modal" data-target="#exampleModal3<?php print $row['c_id'];?>">
  ...
  
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3<?php print $row['c_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">MÜŞTERİ | ADRESLERİ </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php include "customer/c_detay.php";?>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Kapat</button>
        
      </div>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include "inc/altust/footer.php";?>

