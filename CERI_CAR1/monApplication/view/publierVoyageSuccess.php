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
<br/>
<h1 class="sc-19f9nb1-0 sc-16r3gds-0 sc-1bw3ohn-0 lafmmB eSnnVQ jeVbtG">Publier un Trajet</h1>

<div class="container-fluid py-3">
      <div class="col-lg"> 
      <div class="col-md-6 mx-auto"> 
      <div class="card card-body"> 
    <!--le formulaire de publication voyage  -->
      <form id="publier" method="GET" action="">
        
            <div class="form-group">
                  <label for="ID" style = "font-weight: 700;">Depart: </label>
                  <input class="form-control" id="depart" type="text" name="depart" placeholder="Départ" required/>
            </div>
            <div class="form-group">
                  <label for="pass" style = "font-weight: 700;">Arrivée : </label>
                  <input id="arrivee" type="text" name="arrivee" class="form-control" placeholder="Destination" required/>
            </div>
            <div class="form-group">
                  <label for="pass" style = "font-weight: 700;">heureDepart : </label>
                  <input id="heureDepart" type="number" min="0" max="23" name="arrivee" class="form-control" placeholder="HeureDepart" required/>
            </div>
            <div class="form-group">
            <label for="pass" style = "font-weight: 700;">PrixParKm : </label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" id="prixParKm" class="form-control" aria-label="Amount (to the nearest dollar)" required>
            </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1" style = "font-weight: 700;">nombre Place</label>
                <select class="form-control" id="exampleFormControlSelect1">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                </select>
            </div>
            <div class="form-group">
                  <label for="contrainte" style = "font-weight: 700;">Contraintes : </label>
                  <textarea id="contraintes" type="text" name="contraintes" class="form-control" placeholder="Contraintes" rows="3"></textarea>
            </div>
            
            <button type="submit" id="link" class="btn btn-primary">Publier </button><br/>
            </form>

      </div>
      </div>      
      </div>
</div>
<!-- div va contenir le retour de la requete Ajax (succes ou Error)-->
<div id ="result">

</div>
