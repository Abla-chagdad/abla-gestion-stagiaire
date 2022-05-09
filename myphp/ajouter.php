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
   require_once("nav.php");
    ?>
   
    <?php
    if (isset($_POST['ajouter'])){
        $nom = ($_POST['nom']);
        $prenom = ($_POST['prenom']);
        $age = ($_POST['age']);
        if(!empty($nom) && !empty($prenom) && !empty($age)){
           $sqlState = $pdo->prepare("INSERT INTO stagiare VALUES(null,?,?,?)");
           $result= $sqlState->execute([$nom,$prenom,$age]);
        
           if ($result==true)
           // $sqlState = $pdo->prepare("INSERT INTO stagaires VALUES(null,?,?,?)");
            
            ?>
            <div class="alert alert-success">
                STAGAIRE (<?=$nom?>) ET BIEN AJOUTER :
            </div>
            <?php
        }else{
            ?>
                <div class="alert alert-danger">
                    ERROR :
                </div>
                <?php
        }
    }
    ?>
    <br>
    <br>
    <br>
    <div style="margin-left: 15%;">
    <form method="POST">
    <label>Nom :</label>
    <br>
    <input class="col-md-8" type="text" name="nom" value="<?php echo @$nom?>" placeholder="Nom....." >
    <br>
    <label>Prenom :</label>
    <br>
    <input class="col-md-8" type="text" name="prenom" value="<?php echo @$prenom?>" placeholder="Prenom.....">
    <br>
    <label>Age :</label>
    <br>
    <input class="col-md-8" type="number" name="age"value="<?php echo $age?>" placeholder="Age.....">
    <br>
    <br>
    <input class="btn btn-primary" name="ajouter" type="submit" value="Ajouter stagaire">
    </form>
    </div>
</body>
</html>