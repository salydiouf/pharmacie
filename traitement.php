<?php
// var_dump($_POST);
/* Exécution de l'inscription */
try{
$PARAM_serveur = '127.0.0.';
$PARAM_bdd = 'pharmacie';
$PARAM_login = 'root';
$PARAM_mdp = '';
$conn = new PDO('mysql:host=;dbname='.$PARAM_bdd, $PARAM_login, $PARAM_mdp);
}
catch (PDOException $err) {
    die("Connection failed");
  }
if(isset($_POST['envoyer'])){
  if( ! isset( $_POST['num_facture'])){
   
      // Récupération des données utilisateur
      $num_facture = $_POST['facture'];
      $date_achat = $_POST['date_achat'];
      $nom_vendeur = $_POST['vendeur'];
      $nom_client = $_POST['client'];
      $Prix = $_POST['prix'];
      $medicament = $_POST['medicament'];

      // On insère les informations de l'utilisateur dans la base de données
      $sql_register = $conn->prepare("INSERT INTO medicament
      (num_facture, date_achat, nom_vendeur,nom_client,Prix,medicament)
      VALUES (:num_facture, :date_achat, :nom_vendeur, :nom_client, :Prix, :medicament)");
      $sql_register->bindValue(':num_facture', $num_facture, PDO::PARAM_STR);
      $sql_register->bindValue(':date_achat', $date_achat, PDO::PARAM_STR);
      $sql_register->bindValue(':nom_vendeur', $nom_vendeur, PDO::PARAM_STR);
      $sql_register->bindValue(':nom_client', $nom_client, PDO::PARAM_STR);
      $sql_register->bindValue(':Prix', $Prix, PDO::PARAM_STR);
      $sql_register->bindValue(':medicament', $medicament, PDO::PARAM_STR);
      $sql_register->execute();
      print'ok vous avez bien inserer les données';
      

  }

//   elseif( !empty($_POST['id'])){
//     var_dump($_POST);
//     die;
//     $id = strip_tags($_GET['id']);
//     $num_facture = strip_tags($_POST['num_facture']);
//     $date_achat = strip_tags($_POST['date_achat']);
//     $nom_vendeur = strip_tags($_POST['nom_vendeur']);
//     $nom_client = strip_tags($_POST['nom_client']);
//     $Prix = strip_tags($_POST['Prix']);
//     $medicament = strip_tags($_POST['medicament']);
     
//     $sql = "UPDATE `medicament` SET `num_facture`=:num_facture,
//      `date_achat`=:date_achat,`nom_vendeur`=:nom_vendeur,
//      `nom_client`=:nom_client,`Prix`=:Prix,
//       `medicament`=:medicament WHERE `num_facture`=:id;";

//     $query = $db->prepare($sql);

//     $query->bindValue(':num_facture', $num_facture, PDO::PARAM_STR);
//     $query->bindValue(':date_achat', $date_achat, PDO::PARAM_STR);
//     $query->bindValue(':nom_vendeur', $nom_vendeur, PDO::PARAM_INT);
//     $query->bindValue(':nom_client', $nom_client, PDO::PARAM_INT);
//     $query->bindValue(':Prix', $Prix, PDO::PARAM_INT);
//     $query->bindValue(':medicament', $medicament, PDO::PARAM_INT);

//     $query->bindValue(':num_facture', $num_facture, PDO::PARAM_INT);

//     $query->execute();

//    header('Location: lister.php');
// }
    
  }

?>