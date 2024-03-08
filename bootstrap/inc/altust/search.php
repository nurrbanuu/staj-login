<?php 
if(isset($_GET['search'])) {
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad</th>
      <th scope="col">Müşteri Detay</th>
      <th scope="col">Sipariş Detay</th>
    </tr>
  </thead>
  <tbody>
<?php
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM customer WHERE ad_soyad LIKE :search";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':search', "%$search_query%", PDO::PARAM_STR);
    $stmt->execute();
    if (!$stmt->rowCount() > 0) {
       
        
        echo '<div class="alert alert-danger" role="alert">';
        echo "Aranan kişi bulunamadı.";
      echo "</div>";
    } else {
        
        echo "<h2>Arama Sonuçları Sayfası</h2>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            
            ?>

    <tr>
      <th scope="row"><?php echo $row["c_id"];?></th>
      <td><?= $row['ad_soyad'];?></td>
      <td> 
      <button name="düzenle" type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModala<?php print $row['c_id'];?>">
      <a class="item" href="customerdetay.php?id=<?php print $row['c_id'];?> " > Müşteri hakkında detaylı bilgi için tıklayınız !</a>
      </button>

    
    </td>
                                                
      <td><a class="item" href="customer_order.php?id=<?php print $row['c_id'];?> " > Sipariş detayları için tıklayınız !</a></td>>
      
    </tr>
    
<?php  }}} ?>
</tbody>
</table>