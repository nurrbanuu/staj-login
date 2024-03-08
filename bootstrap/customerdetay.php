<?php 
include "baglan.php";
include "inc/altust/header.php";

?>
 <!-- Page Heading -->
 <div>

                        
</div>
<div></div>

                           
                        <!-- liste -->
                        <div class="row">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xL h5 font-weight-bold text-success text-uppercase mb-1">
                                                DETAYLI BİLGİ | MÜŞERİ 
                       
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
                                                <th scope="col"></th>
                                                <th scope="col">ADRESLER</th>
                                                <th scope="col"></th>
                                            </tr>
                                            
                                            </thead>
                                            <tbody>
                                                
                                            <?php 
                                            $sql="SELECT `c_id`, `ad_soyad`, `email`, `tel_no`, `kurum_adi`, `unvan` ,
                                            `m_adres`,`adresbasligi`,`m_adres2`,`adresbasligi2`,`m_adres3`,`adresbasligi3`
                                            FROM `customer` where c_id=:c_id";
                                                $stmt = $db->prepare($sql);
                                                $stmt->bindParam(':c_id', $c_id, PDO::PARAM_INT);
                                                if($stmt->execute()){
                                                  
                                                  if ($stmt->rowCount() > 0){
                                                      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
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
                                                <td><?= $row['adresbasligi2'];?><br><?= $row['m_adres2'];?></td>
                                                <td><?= $row['adresbasligi3'];?><br><?= $row['m_adres3'];?></td>
                                                
                                            </tr><?php  } ?>
                                                <?php  }} ?>
                                                    
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


