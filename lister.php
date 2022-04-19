<?php 
    session_start();
    include_once("tools/tools.php");
    include_once("tools/model.php");
    include_once("tools/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'Includes/head.php';
?>
<body>  
    <br>
    <center><h2> Voici la liste des medicaments de la filiere 
    pharmacie qui se sont inscris</h2></center>
    <br>
    <div class="row">
    <a href="index.php">
        <button style="margin-left: 140px;" type="button" 
        class="btn btn-lg btn-primary">Ajouter medicament</button>
    </a> 
    <a href="acceuil.php"><button type="button" 
    class="btn btn-lg btn-primary">Retour dans acceuil</button>
</a>
  </div>
        <?php
        $tab = [];
        $data = $model->read("medicament", $tab);
        ?>
        <div class="container"><br>
        <table class="table" style="margin-left: 20px;">
<!-- lister  les donner qui sont dans la base de donnée. -->
<!-- <table border="1"> -->
<thead>
<tr>
      <td>id</td>
      <td>num_facture</td>
      <td>date_achat</td>
      <td>nom_vendeur</td>
      <td>nom_client</td>
      <td>Prix</td>
      <td>medicament</td>
      <td> <center>Action</center> </td>

   </tr>

</thead>
<tbody>
<?php foreach ($data as $key => $info) {   ?>

    <tr>
    <td><?= $info['id'] ?></td>
    <td><?= $info['num_facture'] ?></td>
    <td><?= $info['date_achat'] ?></td>
    <td><?= $info['nom_vendeur'] ?></td>
    <td><?= $info['nom_client'] ?></td>
    <td><?= $info['Prix'] ?></td>
    <td><?= $info['medicament'] ?></td>
    <td>
              
            <center>
                <a href= "liste.php?id=<?php echo $info["id"]; ?>"><button type="button" class="btn btn-lg btn-info">details</button></a>
                <a href="update.php?id=<?php echo $info["id"]; ?>"><button type="button" class="btn btn-lg btn-success">Modifier</button></a>
               <a onclick="return confirm ('Vous êtes sûr de supprimer cette personne?')" href="delete.php?id=<?php echo $info["id"]; ?>"><button type="button" class="btn btn-lg btn-danger">Supprimer</button></a>
            </center>
            </td>

    </tr>
    
<?php

}

