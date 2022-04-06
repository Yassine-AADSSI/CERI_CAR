<!-- la vue D'erreur si aucun voyage n'est dispo ou trajet n'existe pas -->
<div class="d-flex justify-content-center">
<div class="alert alert-warning" role="alert" style ="width: 900px">
<h4 class="alert-heading">Message d’erreur</h4>
<hr>

<p><?php echo $context->error;?></p> 
</div>