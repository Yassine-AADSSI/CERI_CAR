<?php
class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}



	public static function index($request,$context){
		
		return context::SUCCESS;
	}
	public static function superTest($request,$context){
		$context->param1 = $_REQUEST['param1'];
		$context->param2 = $_REQUEST['param2'];
		return context::SUCCESS;
	}


	public static function Test($request,$context){
		
		$context->result = voyageTable::getVoyagesByTrajet("355");	
		$context->trajet = trajetTable::getTrajet("Angers","Amiens");
		$context->reservation = reservationTable::getReservationByVoyage(2);
		$context->user = utilisateurTable::getUserById("User1");

		return context::SUCCESS;
	}


	public static function 	rechercheVoyage($request,$context){
		/*
		if(isset($_REQUEST['depart']) && isset($_REQUEST['arrivee'])){

			$context->trajet = trajetTable::getTrajet($_GET['depart'],$_GET['arrivee']);
			//echo empty($context->trajet);
			if($context->trajet != false){
				$context->result = voyageTable::getVoyagesByTrajet($context->trajet->id);
				$context->nontrajet = "";
			}
			else{
				$context->nontrajet = "trajet n'existe pas";
			}
		}
		*/
		return context::SUCCESS;
		
	}
	public static function Ajaxvoyage($request,$context){
		$context->trajet = trajetTable::getTrajet($request['depart'],$request['arrivee']);// verifier si le trajet existe.
		if($context->trajet == false){
			$context->error = "trajet n'existe pas";
			return context::ERROR;
		}
		else{
			$context->result = voyageTable::getCorrespondance($request['depart'],$request['arrivee'],(int)$request['nbre_passagers']);//appel a la methode qui propose les voyage  
			if($context->result == false){
				$context->error = "pas de voyage pour ce trajet";
				return context::ERROR;
			}
			else{
				return context::SUCCESS;
			}
		}

		
	}


public static function Inscription($request,$context){
	// la fonction qui permet a un utilisateur de s'inscrire 
	if(isset($_POST["nom"])){
		$context->saveUser = utilisateurTable::saveUser($_POST["pseudo"],$_POST['pass'],$_POST['nom'],$_POST['prenom']);//enregistrer l'utilisateur.
		return context::SUCCESS;
	}
	return context::SUCCESS;
	
	
}
public static function Connexion($request,$context){

	if(isset($_POST["id"]) && isset($_POST["pass"])){
		echo $_POST["id"];
		$user = utilisateurTable::getUserByLoginAndPass($_POST["id"],$_POST["pass"]);// recuperer l'objet user a partir du login et le mot de passe 
		if($user){
			$context->setSessionAttribute("id",$_POST["id"]);//sauvegarder les infos d'utilisateur. 
			$context->setSessionAttribute("pass",$_POST["pass"]);
			$context->setSessionAttribute("nom",$user->nom);
			$context->setSessionAttribute("prenom",$user->prenom);
			header("location:?action=Home");//move to action home 
			return context::SUCCESS; 
		}
		return context::SUCCESS; 
		
	}
	else{
		unset($_SESSION['id']);
		unset($_SESSION['pass']);
		unset($_SESSION['nom']);
		return context::SUCCESS;
	}
}
public static function Home($request,$context){
	return context::SUCCESS;

}

public static function ReserverVoyage($request,$context){
	/* j'ai utilisé  la fonction http_build_query qui Génère une chaîne de requête en encodage URL pour memoriser
	les ids de voyages et la boucle qui suit construit de nouveau mon tableau des ids voyages depuis l'url*/ 
	$i = 0;
	$array = array();
	while(isset($_GET[$i])){
		array_push($array,$_GET[$i]);
		$i = $i+1;
	}
	if(isset($_SESSION['id'])){
		/*ajout d'une reservation pour les ids de voyages de mon tableau et pour cela j'ai passé l'objet voyage
		et l'objet user parce que ma classe doctrine prend un objet et pas un id de voyage. */
		foreach($array as $value){
			reservationTable::AddReservation(voyageTable::getVoyagesById($value),utilisateurTable::getUserById($_SESSION['id']), $_GET['nbre_passagers']);
		}
		return context::SUCCESS;
	}
	else{
		return context::ERROR;

	}
}

public static function getreservations($request,$context){
	$context->res = reservationTable::getReservationById(utilisateurTable::getUserById($_SESSION['id']));// recuperer l'objet reservation
	return context::SUCCESS;
}
public static function publierVoyage($request,$context){
	
	if($context->getSessionAttribute("id")==NULL){//si l'utilisateur n'est pas connécté je retourne la vue d'erreur.
		$context->error = "Not connected";
		return context::ERROR;
	}
	else{
		
		return context::SUCCESS;
	}

	
}

public static function AjaxAddVoyage($request,$context){
	//verifier si la ville de depart est differente de la ville d'arrivée sinon afficher la vue d'erreur 
	if(strcmp($request['depart'], $request['arrivee']) == 0){
		$context->error = "La ville de depart doit Être differente de la ville d'arrivée";
		return context::ERROR;
	}
	// verifier le prixParKm saisie par l'utilisateur
	else if($request['PrixParKm']<=0){
		$context->error = "Le prix par km doit Être superieure à 0";
		return context::ERROR;	
	}
	else{
		//si non je verifie si le trajet existe 
		$trajet = trajetTable::getTrajet($request['depart'],$request['arrivee']);
		if($trajet == true){
			$retour = voyageTable::AddVoyage(utilisateurTable::getUserById($_SESSION['id']),$trajet,$request['heureDepart'],$trajet->distance,$request['nbre_passagers'],$request['PrixParKm'],$request['contraintes']);
			if($retour == false){
				$context->error = "Le voyage n'est pas publier une erreur est survenue lors de l'ajout";
				return context::ERROR;
			}
			else{
				return context::SUCCESS;
			}
		}
		//le trajet n'existe pas 
		else{
			$context->error = "ce trajet n'existe pas";
			return context::ERROR;
		}
	}	
}

}