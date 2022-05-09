<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    try{
    $connexion = new PDO("mysql:host=localhost;dbname=stagaires","root","abla2001");
    $resultas = $connexion->query("SELECT * FROM stagaires.stagier" );
    $stagier = $resultas->fetchAll(PDO::FETCH_ASSOC);
    echo"<pre>";
    print_r($stagier);
    echo"<pre>";

}catch (PDOException $e) {
   die ("erreur connextion : ".$e->getMessage());
}
?>

</body>
</html>