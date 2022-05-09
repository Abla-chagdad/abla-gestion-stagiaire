<?php
  if (isset($_POST['supprimer'])){
     require_once("database.php");
     $id = $_POST['id'];
     $sqlState = $pdo->prepare('DELETE FROM stagiare WHERE id=?');
     $result = $sqlState->execute([$id]);
    header('location: index.php');


  }


?>