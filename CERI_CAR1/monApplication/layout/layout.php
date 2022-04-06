<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>
     Ton appli !
    </title>
    <script type="text/javascript" src="js/recherchevoyage.js"></script>
    <script type="text/javascript" src="js/addvoyage.js"></script>
    <script type="text/javascript" src="js/reservervoyage.js"></script>
  </head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <body>
    <?php if($context->getSessionAttribute('user_id')): ?>
	  <?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
    <?php endif; ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><strong style="color: rgb(5, 71, 82);">The Cericar</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?action=Home">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if(isset($_SESSION['id'])){ ?>
            <li class="nav-item">  
              <a class="nav-link" href="?action=getreservations"><strong>Mes Reservations</strong> <span class="sr-only">(current)</span></a>
            </li>
            <?php } ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Aide & Contact</a>
            </li>
           
            </ul>
            <?php
              if(isset($_SESSION['id']) && isset($_SESSION['pass'])){
                
              ?>
              <form class="form-inline my-2 my-lg-0">
                  <span><strong style = "font-weight: 700;"><img src="https://img.myloview.fr/stickers/humain-homme-personne-avatar-profil-utilisateur-vector-icon-illustration-700-80389263.jpg" style="height:15px">
                  <?php echo strtoupper($_SESSION['nom']." ".$_SESSION['prenom']);?></strong></span>
                  <a href="?action=Connexion" class="btn btn-primary btn-outline-primary my-2 my-sm-0" style = " margin-left: 10px;" >Deconnexion</a>
              
              </form>
              
            <?php
              }
              else{
            ?>
              <a href="?action=Connexion" class="btn btn-primary btn-outline-primary my-2 my-sm-0" >Connexion</a>
            <?php
            }
            ?>
        </div>
      </nav>


	  <div id="page">
      <div id="page_maincontent">	
      	
      <?php include($template_view); ?>
      </div>
    </div>
    

  </body>

</html>
