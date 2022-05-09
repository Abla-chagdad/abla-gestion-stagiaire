<?php
    try{
    $pdo = new PDO('mysql:host=localhost;dbname=stagaires','root','');
}catch (PDOException $e) {
   die ("erreur connextion : ".$e->getMessage());
}
?>