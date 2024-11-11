<?php

//require_once permet d'inclure et d'exécuter le code du fichier connexion.php
require_once ("../../include/connexion.php");

//récupération de l'id client passé en paramètre GET
// on vérifie l'existence du paramètre au préalable avec la méthode isset
if (isset($_GET['idClient'])) {
    $id = $_GET['idClient'];
   
} else {
    echo "Le paramètre 'id' n'est pas présent dans l'URL.<br>";
}


//Etablit à la connexion à la base de données
$pdo = PdoZakpark::getPdoZakpark();

// permet de récupérer les data de la requête de la fonction getLeClient définie dans include/connexion.php
// L'id récupéré de la variable $GET est transmis en paramètre
$leClient = $pdo->getLeClient($id);

//Affiche les informations en html
include ("../entete.php");

echo "<h1> INFORMATIONS CLIENT </h1>";

echo "<table> <tr><th>Champ</th><th>valeur</th></tr>";
echo "<tr><td> Nom :</td><td>".$leClient["nom"]."</td></tr>";
echo "<tr><td> Prénom :</td><td>".$leClient["prenom"]."</td></tr>";
echo "</table>";             

include ("../pied-page.php");

?>