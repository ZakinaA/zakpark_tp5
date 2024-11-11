<?php
/** 
 * Classe d'accès à la base de données zacpark
 *
 * @package default
 * @author Zakina
 * @version  1.0
 */

 class PdoZakpark{   		

	private static $serveur='mysql:host=localhost;port=3307';
	private static $bdd='dbname=zakpark';   		
	private static $user='root' ;    		
	private static $mdp='' ;	
  	private static $myPdo;
	private static $myPdoZakpark=null;



/**
 * Retourne sous forme d'un tableau associatif tous les clients
 * @return les champs id, nom et prenom des clients  
 */
public function getLesClients(){
	$req = "select id, nom, prenom from Client";	
	$res = PdoZakpark::$myPdo->query($req);
	$lesClients = $res->fetchAll();
	return $lesClients; 
}

/**
 * Retourne l'id, nom et prenom du client
 * @param $id
 * @return un client dont l'id est passé en paramètre
*/
public function getLeClient($id){
	// Préparation de la requête avec un paramètre pour l'id du client
    $req = "SELECT id, nom, prenom FROM Client WHERE id = :id";

    // Préparation de la requête
    $stmt = PdoZakpark::$myPdo->prepare($req);

    // Liaison du paramètre :id à la variable $id
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retourner les données du client
    return $client;
}


/**Méthodes de connexion à la classe, nettoyage*********************************************************************************** */


/**
* Constructeur privé, crée l'instance de PDO qui sera sollicitée
* pour toutes les méthodes de la classe
*/				
private function __construct(){
	PdoZakpark::$myPdo = new PDO(PdoZakpark::$serveur.';'.PdoZakpark::$bdd, PdoZakpark::$user, PdoZakpark::$mdp); 
	PdoZakpark::$myPdo->query("SET CHARACTER SET utf8");
  }
  
  
	  
  public function _destruct(){
		  PdoZakpark::$myPdo = null;
	  
  }
  
  /**
   * Fonction statique qui crée l'unique instance de la classe
   * Appel : $instancePdoZakpark = PdoZakpark::getPdoZakpark();
   * @return l'unique objet de la classe PdoZakpark
   */
	  public  static function getPdoZakpark(){
		  if(PdoZakpark::$myPdoZakpark==null){
			  PdoZakpark::$myPdoZakpark= new PdoZakpark();
		  }
		  return PdoZakpark::$myPdoZakpark;  
	  }
}
?>