<?php
// Inclusion de la classe reservation 
require_once "reservation.class.php";


// les reservation d'un voyage
class reservationTable{
	public static function getReservationByVoyage($voyage)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyage' => $voyage));	
		
		return $reservation; 
	}
	public static function AddReservation($voyage,$voyageur,$nbre_passagers){
		$em = dbconnection::getInstance()->getEntityManager();

		$reservation = new reservation();
		$reservation->voyage = $voyage;
		$reservation->voyageur = $voyageur;
		$res = $em->persist($reservation);// preparer l'objet pour l'insertion.
		$em->flush();//synchroniser l'objet avec la base.
		$voyage->nbplace = $voyage->nbplace - $nbre_passagers;// nbre de place pour le voyage reduit. 
		$res = $em->persist($voyage);
		$em->flush();//synchroniser l'objet avec la base.
		return "success";
	}
	public static function getReservationById($voyageur)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyageur' => $voyageur));	
		
		return $reservation; 
	}

}

?>
