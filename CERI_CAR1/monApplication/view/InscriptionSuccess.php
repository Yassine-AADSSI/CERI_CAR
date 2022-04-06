      <div class="container-fluid bg-light py-3" style="margin-top:100px;">
        <div class="col-lg"> 
        <div class="col-md-6 mx-auto"> 
        <div class="card card-body"> 
        <form method="post" action=""> 
         <div class="form-row">
              <div class="col">
                <label for="nom" style = "font-weight: 700;">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Nom" required/>
            </div>
            
            <div class="col">
               <label for="Prénom" style = "font-weight: 700;" >Prénom</label>
               <input type="text" class="form-control" name="prenom" placeholder="Prénom" required/><br />
            </div>
         </div>
         <div class="form-group">
               <label for="ID" style = "font-weight: 700;">Identifiant: </label>
               <input type="text" class="form-control" name="pseudo" placeholder="Entrez un ID" required/>
         </div>
         
         <div class="form-group">
               <label for="pass" style = "font-weight: 700;">Password : </label>
               <input type="password" name="pass" class="form-control" placeholder="Entrez un mot de passe" required/>
         </div>
         <button type="submit" class="btn btn-primary">Confirmer</button><br/>
         <?php
            if($context->saveUser == "success"){
         ?>
            <strong style="color: black" > Votre compte a bien été créé veuillez</strong>
         <?php
            }
         ?>
         
         
         <a href="?action=Connexion" style = "color: #1877f2 font-size: 14px font-weight: 500">se connecter </a> 
         </form>

         </div>
      </div>      
      </div>
</div>