<?php

require_once ("../../include/connexion.php");


$pdo = PdoZakpark::getPdoZakpark();
$lesClients = $pdo->getLesClients();

echo "<h1> LISTE DES CLIENTS </h1>";

echo "<table> <tr><th>numéro</th><th>nom</th><th>prenom</th></tr>";

foreach ($lesClients as $unClient)
{
    echo    "<tr>
                <td>".$unClient["id"]."</td>
                <td><a href=client.php?idClient=" .$unClient["id"] .">" . $unClient["nom"]."</a></td>
                <td>".$unClient["prenom"]."</td>
            </tr>"; 
}
echo "</table>" ;   

?>