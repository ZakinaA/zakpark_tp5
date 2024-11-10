<?php

require_once ("../../include/connexion.php");

//récupération de l'id client passé en paramètre GET
if (isset($_GET['idClient'])) {
    $id = $_GET['idClient'];
   
} else {
    echo "Le paramètre 'id' n'est pas présent dans l'URL.<br>";
}

$pdo = PdoZakpark::getPdoZakpark();
$leClient = $pdo->getClient($id);

echo "<h1> INFORMATIONS CLIENT </h1>";

echo "<table> <tr><th>Libelles</th><th>data</th></tr>";
echo "<tr><td> Nom :</td><td>".$leClient["nom"]."</td></tr>";
echo "<tr><td> Prénom :</td><td>".$leClient["prenom"]."</td></tr>";
echo "</table>";             

  

?>