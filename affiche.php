<?php
require_once('db_connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `medicament` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
  
}

?>

<?php include_once "function.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulaire de modification</h2>
    
  <div class="container">
<form action="traitement.php" method="POST">
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
  <?= input("numero de facture", "facture","","",$result['num_facture'], 'required') ?>
</div>
<div class="col-12 col-sm-6 col-md-3"><?= input("Entrer la date","date", "date","","",$result['date_achat']) ?></div>
<div class="col-12 col-sm-6 col-md-3"><?= input("entrer 
le nom du vendeur", "vendeur","","",$result['nom_vendeur']) ?></div>
</div>
<div class="row">
<div class="col-12 col-sm-6 col-md-3"><?= input("entrer le nom du client", "client","","",$result['nom_client']) ?></div>
<div class="col-12 col-sm-6 col-md-3"><?= input("entre le prix", "prix","","",$result['Prix']) ?></div>
<?php $medicament = ["paracetamol", "dinapare", "doliprane",
 "litacolde", "CAC1000","","",$result['medicament']];
    ?>
    <div class="col-12 col-sm-6 col-md-3">
        <?= select("Selectionner
     Votre medicament", "medicament", $medicament,
      "") ?>
</div>
</form>
</body>
</html>