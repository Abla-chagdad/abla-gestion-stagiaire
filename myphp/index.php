<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("database.php");
   require_once("nav.php")
    ?>
    <?php
    ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
    ?>
    <br>
    <br>
    <br>
    <form method="post">
    <input style="float: right;" class="btn btn-success" formaction="ajouter.php" type="submit" value="AJOUTER">
    </form>
    <?php            
         $sqlState = $pdo->query ("SELECT * FROM stagaires.stagiare");
         $sqlState->execute();
         $stagiare = $sqlState->fetchAll(PDO::FETCH_OBJ);
        

          ?>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>nom</th>
                <th>prenom</th>
                <th>age</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          foreach($stagiare as $key => $value){
        
        ?>
            <tr>
                <th><?php echo $value->id?></th>
                <td><?php echo $value->nom?></td>
                <td><?php echo $value->prenom?></td>
                <td><?php echo $value->age?></td>
                <td>
                <form method="POST">   
                    <input  type="hidden" type="text" name="id" value="<?php echo $value->id?>">
                    <input  formaction="modifier.php" class='btn btn-sm btn-primary' type='submit' value='MODIFIER'>
                    <input  formaction="supprimer.php"  class='btn btn-sm btn-danger' type='submit' value='SUPPRIMER'name='supprimer' onclick="return confirm('voulez vous vrament supprimer <?php echo $value->nom?>?')">
                </form>
                </td>
            </tr>
           <?php     
         }?> 
          </tbody>
     
     </table>
  </body>
  </html>
