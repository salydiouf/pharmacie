<?php 
    // require('Actions/questions/modification.php');
    // require('Actions/questions/recupere.php');
    include_once("tools/tools.php");
    include_once("tools/model.php");
    include_once("tools/config.php");

    try{
      $PARAM_serveur = '127.0.0.1';
      $PARAM_bdd = 'pharmacie';
      $PARAM_login = 'root';
      $PARAM_mdp = '';
      $dbconnection = new PDO('mysql:host=;dbname='.$PARAM_bdd, $PARAM_login, $PARAM_mdp);
      }
      catch (PDOException $err) {
          die("Connection failed");
        }

    $sql ='select * from medicament where id='.$_GET['id'];
    $question=$dbconnection->query($sql)->fetch();
 
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body>
    <br><br>
    <a href="acceuil.php"><button style="margin-left: 100px;" type="button" class="btn btn-lg btn-primary">Retour dans acceuil</button></a>
    <br><br>
    <form class="container" action="#" method="POST">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="form-group">
            <label for="num_facture">num_facture:</label>
            <input type="text" class="form-control" name="num_facture" value="<?= $question["num_facture"]; ?>">
        </div>
        <div class="form-group">
            <label for="date_achat">date_achat:</label>
            <input type="text" class="form-control" name="date_achat" value="<?= $question["date_achat"]; ?>">
        </div>

        <div class="form-group">
            <label for="nom_vendeur"> nom_vendeur:</label>
            <input type="text" class="form-control" name="nom_vendeur" value="<?= $question["nom_vendeur"]; ?>">
        </div>
      
        <div class="form-group">
            <label for="nom_client">nom_client:</label>
            <input type="text" class="form-control" name="nom_client" value="<?= $question["nom_client"]; ?>">
        </div>
        <div class="form-group">
            <label for="Prix">Prix:</label>
            <input type="text" class="form-control" name="Prix" value="<?= $question["Prix"]; ?>">
        </div>
        <div class="form-group">
            <label for="medicament">medicament:</label>
            <input type="text" class="form-control" name="medicament" value="<?= $question["medicament"]; ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Modifier</button>
    </form>
</body>
</html>
<?php
if(isset($_POST['validate'])){
  unset($_POST['validate']);
    $model->update("medicament", $_POST,$_GET['id']);
   
}
?>