<?php 
include "baglan.php";

?> 
<div class="row">
                

                <!-- düzen -->
                <div class="col-xl col-md-6 mb-4">
                    
                                <div class="col mr-2">
                                    
                            <div>
<form action="o_detay.php"  method="post"  >               
 <table class="table">
  <thead class="thead-light">
  <?php 
  

  
  if($_POST && isset($_POST["orderdetay"])){

  $query = $db->query("SELECT `s_id`,`siparis_no`, `adres`, `fatura_adresi`, `s_aciklama` 
                                            FROM `orders`", PDO::FETCH_ASSOC);
                                                if ( $query->rowCount() ){
                                                     foreach( $query as $row ){ ?>
    <tr>
        <th scope="col">Adres</th>
        
    </tr>
    <tr><td>
    
    <input type="text" name="adres" class="form-control "
        placeholder="Adres" value="<?=$row['adres'];?>">
    </td>
    <tr>
        <th scope="col">Fatura Adresi</th> 
    </tr>
        <td> <input type="text" name="adres" class="form-control "
        placeholder="Fatura Adresi" value="<?=$row['fatura_adresi'];?>">
    </td></tr>
  </thead>
<tbody>
 <?php  } ?><?php } } ?>
</tbody>
</table>
                        </form>
                            </div>
                                </div>
                            </div>
                        </div>
                         