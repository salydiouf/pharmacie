<?php 
    session_start();
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
        
    $sql='select * from medicament where id='.$_GET['id'];
 
    $infosDonneurs=$dbconnection->query($sql)->fetch();
  

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'Includes/head.php'; ?>
<body>  
    <br>
    <center><h2>    <i>Informations sur le medicament</i></h2></center>
    <br>
    <div class="row">
    <a href="index.php"><button style="margin-left: 140px;" type="button" class="btn btn-lg btn-primary">Ajouer donneur</button></a> 
    <a href="acceuil.php"><button type="button" class="btn btn-lg btn-primary">Retour dans acceuil</button></a>

  </div>
  
        <div class="container"><br>
        <table class="table" style="margin-left: 20px;">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Libelle</th>
                <th>Informations</th>
                
            </tr>
            </thead>

                <tr>
                <th class="text-center">1</th>
                <td> num_facture : </td>
                <td><?=$infosDonneurs["num_facture"]?></td>
                </tr>

                <tr>
                <th class="text-center">2</th>
                <td> date_achat : </td>
                <td><?=$infosDonneurs["date_achat"]?></td>
                </tr>

                <tr>
                <th class="text-center">3</th>
                <td> nom_vendeur : </td>
                <td><?=$infosDonneurs["nom_vendeur"]?></td>
                </tr>

                <tr>
                <th class="text-center">4</th>
                <td> nom_client: </td>
                <td><?=$infosDonneurs["nom_client"]?></td>
                </tr>

                <tr>
                <th class="text-center">5</th>
                <td> Prix : </td>
                <td><?=$infosDonneurs["Prix"]?></td>
                </tr>

                <tr>
                <th class="text-center">6</th>
                <td> medicament : </td>
                <td><?=$infosDonneurs["medicament"]?></td>
                </tr>

            </tbody>
            </table>
                
            </div>       
                
    </div>

</body>
</html>