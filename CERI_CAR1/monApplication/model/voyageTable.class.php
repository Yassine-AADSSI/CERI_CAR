<?php
// Inclusion de la classe utilisateur
require_once "voyage.class.php";

class voyageTable {

	public static function getVoyagesByTrajet($trajet)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$voyageRepository = $em->getRepository('voyage');
		$voyage = $voyageRepository->findBy(array('trajet' => $trajet));	
		if ($voyage == false){
			echo 'Erreur sql';
		}
		return $voyage; 
	}

	public static function getVoyagesById($id){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$voyages = $voyageRepository->findOneBy(array('id' => $id));
		return $voyages;	
	}

	public static function getCorrespondance($depart,$arrivee,$nbre_passagers)
	{
		$em = dbconnection::getInstance()->getEntityManager()->getConnection();
		$query = $em->prepare("select * from mafonction4(?,?,?,?,?,?,?,?)");//j'appelle ma fonction plsql. 
		$bool = $query->execute(array($depart,$arrivee,NULL,NULL,0,0,0,$nbre_passagers));
		if ($bool == false){
			return NULL;
		}
		return $query->fetchAll();
	}

	public static function AddVoyage($user,$trajet,$heureDepart,$distance,$nbPlace,$prixParKm,$contraintes){
		$em = dbconnection::getInstance()->getEntityManager();
		$tarif = $prixParKm * $distance;//calcul du tarif a partir la distance du trajet et le prixParKm saisie par l'utilsateur.
		$voyage = new voyage();
		$voyage->conducteur =  $user;
		$voyage->trajet = $trajet;
		$voyage->tarif = $tarif;
		$voyage->nbplace = $nbPlace;
		$voyage->heuredepart = $heureDepart;
		$voyage->contraintes = trim($contraintes); // trim Supprime les espaces en début et fin de chaîne
		$voy = $em->persist($voyage);//prépare l'objet 
		$em->flush();//synchronisé avec la base de données l'état de l'objet
		return $voyage;
	}
	
}

?>
