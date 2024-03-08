<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=bootstrap", "root", "");
//echo "veri tabanı bağlantısı başarılı ";
    } catch ( PDOException $e ){
     print $e->getMessage();
}
?>