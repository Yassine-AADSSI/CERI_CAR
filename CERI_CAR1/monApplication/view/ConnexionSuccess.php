<!-- Formulaire de connexion -->
<div class="container-fluid bg-light py-3" style="margin-top:100px;">
      <div class="col-lg"> 
      <div class="col-md-6 mx-auto"> 
      <div class="card card-body"> 
      <form method="post" action="">
        
            <div class="form-group">
                  <label for="ID" style = "font-weight: 700;">Identifiant: </label>
                  <input type="text" class="form-control" name="id" placeholder="Entrez votre ID" required/>
            </div>
            <div class="form-group">
                  <label for="pass" style = "font-weight: 700;">Password : </label>
                  <input type="password" name="pass" class="form-control" placeholder="Entrez votre mot de passe" required/>
            </div>
            <button type="submit" class="btn btn-primary">se connecter</button><br/>
            <a href="?action=Inscription" style = "color: #1877f2 font-size: 14px font-weight: 500">Crée un compte</a>
            </form>

      </div>
      </div>      
      </div>
</div>