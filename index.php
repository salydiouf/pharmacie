<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de vente</title>
        <style>
            body{
                background-color:pink;
            }
        </style>
</head>
<body>
    <div align="center">
    <form action="traitement.php" method="POST">
    <h1>Enregistrement d'un medicament </h1>
    <table>
       
    <tr>
        <th>
        <td>numero de facture</td>
        <td><input type="number" name="facture" required="required"></td>
</th>
    </tr>
    <tr>
        <th>
        <td> entrer la date</td>
        <td><input type="date" name="date_achat" required="required"></td>
</th>
    </tr>
     <tr>
     <th>
        <td>entrer le nom du vendeur </td>
        <td><input type="text" name="vendeur" required="required"></td>
</th>
    </tr>
    <tr>
    <th> 
        <td>entrer le nom du client</td>
        <td><input type="text" name="client" required="required"></td>
</th>
    </tr>
    <tr>
    <th> 
        <td>entre le prix</td>
        <td><input type="text" name="prix" required="required"></td>
</th>
    </tr>

<tr>  
    <th>
<td>quel est votre medicament</td>
        <td>
            <select name="medicament"> 
                <option value="paracetamol">paracetamol</option>
                <option value="dinapare">dinapare</option>
                <option value="doliprane">doliprane</option>
                <option value="litacolde">litacolde</option>
                <option value="CAC1000">CAC1000</option>
            
            </select>
           
        </td>
</th>
    </tr>

        <td colspan="2">
            <input type="submit" name="envoyer" value="Envoyer">
        </td>
        
  
</form>
</table>
</div>

</body>
</html>   


            
       

   
    
