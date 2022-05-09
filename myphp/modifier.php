<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
      <?php
       if(!isset($_POST['id'])){
          header('location: index.php');
         }
       require_once("database.php");
       require_once("nav.php");

       $id=$_POST ['id'];
       $sqlState= $pdo->prepare(' SELECT * FROM stagiare WHERE id=?');
       $sqlState->execute([$id]);
       $value = $sqlState->fetch(PDO::FETCH_OBJ);
       if(isset($_POST['modifier2'])){
           $nom = $_POST['nom'];
           $prenom = $_POST['prenom'];
           $age = $_POST['age'];
           $id = $_POST['id'];
           if(!empty($id) && !empty($nom)&& !empty($prenom) && !empty($age) ){
               $sqlState = $pdo->prepare('UPDATE stagiare SET nom=? , prenom=? , age=? WHERE id=? ');
               $result = $sqlState->execute([$nom,$prenom,$age,$id]);
               echo "id: $id , nom : $nom , prenom : $prenom , age : $age";
               if($result == true){
                   header('location:index.php');
               }
           }else{
               

           }

       }
    
    ?>
     
  
                
    <br>
    <br>
    <br>
    <div style="margin-left: 15%;">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $value->id ?>">
    <label>Nom :</label>
    <br>
    <input class="col-md-8"  type="text" name="nom" value="<?php echo $value->nom?>" placeholder="Nom....." >
    <br>
    <label>Prenom :</label>
    <br>
    <input class="col-md-8" type="text" name="prenom" value="<?php echo $value->prenom?>" placeholder="Prenom.....">
    <br>
    <label>Age :</label>
    <br>
    <input class="col-md-8" type="number" name="age"value="<?php echo $value->age?>" placeholder="Age.....">
    <br>
    <br>
    <input class="btn btn-primary" name="modifier2" type="submit" value="modifier stagaire">
    </form>
    </div>
    
</body>
</html>