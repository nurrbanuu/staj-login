<?php 
include "baglan.php";
if(isset($_POST["duzelt"])){
    
}
?> 





  
 <div class="row">
                <!-- düzen -->
                <div class="col-xl  mb-4">
                    <div class="card border-warning shadow h-300 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                               
                            <div>
                            <form action="customer.php"  method="POST"  >
  <p>Lütfen güncellemek istediğiniz adresi seçiniz:</p>
  <input type="checkbox" id="a1" name="a1" value="a1">
  <label for="a1"><?=$row['adresbasligi'];?> - <?=$row['m_adres'];?></label><br>
  <input type="checkbox" id="a2" name="a2" value="a2">
  <label for="a2"><?=$row['adresbasligi2'];?> - <?=$row['m_adres2'];?></label><br>
 <!--<input type="checkbox" id="a3" name="a3" value="a3">
  <label for="a3"><?=$row['adresbasligi3'];?> - <?=$row['m_adres3'];?></label><br>-->
                    
                        <div class="form-group">
                        Adres Başlığı:
                            <input type="text" name="adresb" class="form-control form-control-user"
                                placeholder="Adres Başlığı " value="adres başlığı...">
                        
                        Adres:
                            <input type="text" name="m_adres" class="form-control form-control-user"
                                placeholder="Adres" value="adres..." >
                        </div>
                        <button type="submit" name="duzelt" class="btn btn-success">adres güncelle</button>

                        </form>
                       
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>  


                

                </div>  