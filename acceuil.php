<?php 
    session_start();
    include_once("tools/tools.php");
    include_once("tools/model.php");
    include_once("tools/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'Includes/head.php'; ?>
<body>  
  <div class="container">

  <h1>Bienvenue au CNTS</h1>
  <img src="photos/capture.png" alt="la photos" width="100%" height="450px">

<hr>
    <h2>Présentation du CNTS</h2>
  <hr>

  <p>
Le CNTS a été créé en 1963 (Loi des finances du 31.12.63). Il s'agit d'un Etablissement public à caractère administratif (EPA), doté de la personnalité civile et de l'autonomie financière dans lequel sont prélevés et préparés le sang humain et ses dérivés. Il s’agit d’un centre hospitalo-universitaire. Sa compétence s'étend à l'ensemble du territoire du pays.

Il comprend par ailleurs 5 centres régionaux dont la compétence correspond à la circonscription territoriale de la région sanitaire concernée :

Le centre régional de Sousse créé en 1992.
Le centre régional de Sfax créé en 1992.
Le centre régional de Jendouba créé en 1994.
Le centre régional de Gabès créé en 1995.
Le centre régional de Gafsa créé en 1998.
  </p><br>
  <div class="row">
      <a href="lister.php"><button type="button" class="btn btn-lg btn-primary">Lister</button></a>
      <a href="contact.php"><button type="button" class="btn btn-lg btn-success">Nous contactez</button></a>
      <a href="Actions/users/logoutAction.php"><button type="button" class="btn btn-lg btn-danger">Déconnection</button></a>
  </div>
  </div>
</body>
</html>