<!-- La vue qui affiche les réservation de l'utilisateur connecté-->
<br/>
<br/>
<?php 
foreach ($context->res as $value):
  $heureArrivee = $value->voyage->heuredepart + ($value->voyage->trajet->distance/60);
?>
<div class="card-body" style="background-color:#34568B;padding-top:5px; width: 50%;">
        <div class="row">
          <div class="col col-lg-4" style="margin-left:10px;">
            <ul class="list-group " >
              <li class="list-group-item border-0" style="background-color:#34568B;padding:0px;">
                <div class="col">
                <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <?php echo $value->voyage->heuredepart; ?>:00</span>
                </div>
                <div class="col">
                <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <?php echo $value->voyage->trajet->depart; ?></span>
                </div>
                <div class="col">
                <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <?php echo (int) $heureArrivee; ?>:00</span>
                </div>
                <div class="col">
                <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <?php echo $value->voyage->trajet->arrivee; ?></span>
                </div>

                

</li></ul></div></div></div>
<div class="card-body" style="background-color:#5F9EA0;padding-top:5px; width: 50%;">
            <div class="row">
            <div class="col col-lg-4" style="margin-left:10px;">
            <ul class="list-group " >
            <li class="list-group-item border-0" style="background-color:#5F9EA0;padding:0px; width: 60%;">
                <div class="col" style =" min-width: 500px;">
                <span style =" color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <stong>contraintes: <?php echo $value->voyage->contraintes; ?> </strong></span>
                </div>  
            </li>
      
      
      </ul></div></div></div>
<br/>



<?php endforeach; ?>


        