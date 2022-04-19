<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=pharmacie;charset=utf8;','root','');
} catch (Exception $e) {
    die('une erreur à été trouvée : '.$e->getMessage());
}
?>