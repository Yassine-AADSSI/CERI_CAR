<!-- la vue appélé en AJAX quand l'utilisateur recherche un voyage les voyages sont affiché dans des cards-->

<?php 
if (isset($_GET['depart'] ) && $context->result == true)
      {
            $context->retour="recherche terminée";
?>


<h3 class="w3-center">Voyages : </h3>

       

      <?php
      $prix = 0;
      $my_array = array();
      foreach ($context->result as $value):
      $prix = $prix + $value['v__tarif'];
      array_push($my_array, $value['v_id_voyage']);
      ?>
      
      <div class="card-body" style="background-color:#34568B;padding-top:5px; width: 46.5%; margin-left:26.8%">
        <div class="row">
          <div class="col col-lg-4" style="margin-left:10px;">
            <ul class="list-group " >
              <li class="list-group-item border-0" style="background-color:#34568B;padding:0px;">
                <div class="col">
                <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <?php echo $value['v__heuredepart']; ?>:00</span>
                </div>
                <div class="col" >
                  <p style ="color:#F8F8FF ;font-size: 20px;font-weight: 500;font-family: 'Trebuchet MS', serif;"><?php echo $value['v_dep'] ?></p>
                </div>
                <div class="col" >
                  <p style ="color:#F8F8FF ;font-size: 20px;font-weight: 500;font-family: 'Trebuchet MS', serif;"><?php echo $value['v__heurearrivee'] ?>:00</p>
                </div>
                <div class="col" >
                  <p style ="color:#F8F8FF ;font-size: 20px;font-weight: 500;font-family: 'Trebuchet MS', serif;"><?php echo $value['v_arr'] ?></p>
                </div>
            </li>
     </ul>
     </div>

</div>
<div class="row">
            <div class="col col-lg-4" style="margin-left:10px;">
            <ul class="list-group " >
            <li class="list-group-item border-0" style="background-color:#5F9EA0;padding:0px;">
                  <div class="col">
                        <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> <strong> Contraintes : </strong><?php echo $value['v__contraintes']; ?></span>
                  </div>
            </li>
</ul></div></div>
</div>
      <?php if($value['v_arr'] == $_GET['arrivee']){
      ?>     
            <div class="card-body" style="background-color:#5F9EA0;padding-top:5px;width: 46.5%; margin-left:26.8%">
            <div class="row">
            <div class="col col-lg-4" style="margin-left:10px;">
            <ul class="list-group " >
            <li class="list-group-item border-0" style="background-color:#34568B;padding:0px; width: 60%;">
                  <div class="col">
                        <span style ="color: #F2F2F2 ;font-size: 18px;font-weight: 600;font-family: 'Trebuchet MS', serif;"> Prix: <?php echo $prix; ?>€</span>
                  </div>
            </li>
      
      
      </ul></div></div>
     
      <div class="row">
            <div class="col col-lg-4" style="margin-left:10px; padding-top:5px;">
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-index = "<?php echo http_build_query($my_array) ?>" data-nbre_passagers = "<?php echo $_GET['nbre_passagers']?>" class=" btn1 btn btn-dark">Reserver</button>
      </div></div>

      </div>
            <br/><br/>
      <?php
            $prix = 0;
            $my_array = array();
            }
      ?>



     

      <?php endforeach; ?>


        

<?php
      }
      
      
?>

