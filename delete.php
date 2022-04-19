<?php
session_start();
include_once("tools/tools.php");
include_once("tools/model.php");
include_once("tools/config.php");
require('Actions/database.php');
require('db_connect.php');

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
// $sql ='select * from medicament where id='.$_GET['id'];
//     $question=$dbconnection->query($sql)->fetch();

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $id = $_GET['id'];

    $delete = $bdd->prepare('DELETE FROM medicament WHERE id = ?');
    $delete->execute(array($id));

            header('Location: lister.php');

 }else{
     echo "Aucune suppression...";
 }
 ?>
 <?php
 if(isset($_POST['validate'])){
    unset($_POST['validate']);
      $model->update("medicament", $_POST,$_GET['id']);
     
  }
    // $model->delete("medicament", $_POST,$_GET['id']);
?>