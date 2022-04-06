<!-- Style de page -->
<style>
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
.eSnnVQ {
    color: rgb(5, 71, 82);
    font-size: 30px;
    line-height: 1.06;
    font-weight: 500;
}
.jeVbtG {
    --space-bottom: 32px;
    --font-size-desktop: 40px;
    padding-top: ;
    padding-bottom: ;
    padding-left: 24px;
    padding-right: 24px;
    margin: 0px;
}
.jeVbtG {
    text-align: center;
    font-size: var(--font-size-desktop);
}
.lafmmB {
    white-space: pre-line;
}
</style>
<h1 class="sc-19f9nb1-0 sc-16r3gds-0 sc-1bw3ohn-0 lafmmB eSnnVQ jeVbtG">Où voulez-vous aller ?</h1>
<!-- ce formulaire sert a rechercher un voyage-->
<div class="container-fluid py-3">
      <div class="col-lg"> 
      <div class="col-md-6 mx-auto"> 
      <div class="card card-body"> 
      <form id="recherche" method="GET" action="">
        
            <div class="form-group">
                  <label for="ID" style = "font-weight: 700;">Depart: </label>
                  <input class="form-control" id="depart" type="text" name="depart" placeholder="Départ" required/>
            </div>
            <div class="form-group">
                  <label for="pass" style = "font-weight: 700;">Arrivée : </label>
                  <input id="arrivee" type="text" name="arrivee" class="form-control" placeholder="Destination" required/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1" style = "font-weight: 700;">Passagers</label>
                <select class="form-control" id="exampleFormControlSelect1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                </select>
            </div>
            <button type="submit" id="link" class="btn btn-primary">Rechercher </button><br/>
            </form>

      </div>
      </div>      
      </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- div va contenir la réponse de la requete Ajax soit la confirmation de réservation soit la vue d'erreur associé à cette action -->
      <div id = "content" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id = "result" >

</div>
