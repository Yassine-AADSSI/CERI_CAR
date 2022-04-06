<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass)
	{
  	$em = dbconnection::getInstance()->getEntityManager() ;

	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
	
	if ($user == false){
		echo 'Erreur sql';
			   }
	return $user; 
	}


	

	public static function getUserById($id){
		$em = dbconnection::getInstance()->getEntityManager();
		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $id));	
		
		return $user; 
		

	}
 public static function saveUser($id,$pass,$nom,$prenom){
		$em = dbconnection::getInstance()->getEntityManager();
		$tab = utilisateurTable::getUserById($id);
		if(count($tab)>0){ 
				echo "Ce login existe";
		}
		else{
			
			$utilisateur = new utilisateur();
			$utilisateur->identifiant = $id;
			$utilisateur->nom = $nom;
			$utilisateur->prenom = $prenom;
			$cryptpass = sha1($pass);
			$utilisateur->pass = $cryptpass;
			$user = $em->persist($utilisateur);
        	$em->flush();
			return "success";
		
		}


		//**** Ancien code : 
		//$em = dbconnection::getInstance()->getEntityManager()->getConnection();
		//$query = $em->prepare("select identifiant from jabaianb.utilisateur where identifiant=? limit 1");
		//$query->execute(array($id));
		//$tab = $query->fetchAll();
		//$query = $em->prepare("insert into jabaianb.utilisateur(identifiant,pass,nom,prenom)values(?,?,?,?)");
		//$cryptpass = md5($pass);
		//$query->execute(array($id,$cryptpass,$nom,$prenom));
		
	}
}

?>
