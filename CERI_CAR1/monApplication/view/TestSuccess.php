function to test the model ! dingue non ? 
<table>
<thead>
<strong> id du trajet passé en parametre :</strong><br/>
<?php
// getTrajet : 
echo $context->trajet->id;
echo $context->trajet->depart;
echo $context->trajet->arrivee;
echo $context->trajet->distance;

//recuperer les voyages d'un trajet : 

foreach ($context->result as $value){ 
?>
    
    <tr>
            <th>id</th>
            <th >conducteur</th>
            <th >depart </th>
            <th >arrivee</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            
            <td><?php echo $value->id; ?></td>
            <td><?php echo $value->conducteur->nom; ?></td>
            <td><?php echo $value->trajet->depart; ?></td>
            <td><?php echo $value->trajet->arrivee; ?></td>


        </tr>

<?php } ?>


