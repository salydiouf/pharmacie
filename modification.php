<?php 
var_dump($_GET);
//validation du formulaire
if(isset($_POST['validate'])){

    //verifier si les champs sont remplis
    if(!empty($_POST['num_facture']) AND !empty($_POST['date_achat']) AND
     !empty($_POST['nom_vendeur']) AND !empty($_POST['nom_client']) AND
      !empty($_POST['Prix']) AND !empty($_POST['medicament'])){

        $id = $_GET["id"];


        //les donnes a faire passe dans la requete
        $num_facture = htmlspecialchars($_POST['num_facture']);
        $date_achat = htmlspecialchars($_POST['date_achat']);
        $nom_vendeur = htmlspecialchars($_POST['nom_vendeur']);
        $nom_client = htmlspecialchars($_POST['nom_client']);
        $Prix = htmlspecialchars($_POST['Prix']);
        $statut = htmlspecialchars($_POST['statut']);
        $medicament = htmlspecialchars($_POST['medicament']);

        //modifier les information de question qui possede id passer en parametre
        $edit = $bdd->prepare('UPDATE medicament SET num_facture = ?, date_achat = ?,
         nom_vendeur = ?, nom_client  = ?, Prix = ?, medicament = ? WHERE id = ?');
        $edit->execute(array($num_facture, $date_achat, $nom_vendeur, $nom_client,$Prix, $medicament, $id));

        header('Location: lister.php');
    }else{
        $errorMsg ='veuiller completer tous les champs...';
    }
}
?>