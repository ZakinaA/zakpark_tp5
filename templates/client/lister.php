<?php

/** 
 * Page permettant de lister les clients
 *
 * @package default
 * @author Zakina
 * @version  1.0
 */

//require_once permet d'inclure et d'exécuter le code du fichier connexion.php
require_once ("../../include/connexion.php");

//Etablit à la connexion à la base de données
$pdo = PdoZakpark::getPdoZakpark();

// permet de récupérer les data de la requête de la fonction getLesClients définie dans include/connexion.php
$lesClients = $pdo->getLesClients();

//Affiche les informations en html
// la Ligne 21 contient un lien <a href> vers la page consulter.php et passe le paramètre idClient et sa valeur

echo "<h1> LISTE DES CLIENTS </h1>";
echo "<table> <tr><th>numéro</th><th>nom</th><th>prenom</th></tr>";

foreach ($lesClients as $unClient)
{
    echo    "<tr>
                <td>".$unClient["id"]."</td>
                <td><a href=consulter.php?idClient=" .$unClient["id"] .">" . $unClient["nom"]."</a></td>
                <td>".$unClient["prenom"]."</td>
            </tr>"; 
}
echo "</table>" ;  


?>