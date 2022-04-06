//j'ai déclarer une methode qui crée l'objet Ajax.
var getHttpRequest = function () {
    var httpRequest = false;
  
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
      httpRequest = new XMLHttpRequest();
      if (httpRequest.overrideMimeType) {
        httpRequest.overrideMimeType('text/xml');
      }
    }
    else if (window.ActiveXObject) { // IE
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {}
      }
    }
  
    if (!httpRequest) {
      alert('Abandon :( Impossible de créer une instance XMLHTTP');
      return false;
    }
  
    return httpRequest
}
$(document).ready(function(){
    $('#recherche').submit(function(e){
      e.preventDefault(); // Annulez l'action par défaut du formulaire.
      //récupérer les données saisies dans le formulaire
      var villeDepart = $("#depart").val();
			var villeArrivee = $("#arrivee").val();
      var nbre_passagers = $("#exampleFormControlSelect1").val(); 
      var xhr = getHttpRequest(); // Appel a la methode qui instancie l'objet AJAX 
      xhr.onreadystatechange = function () { //associer une fonction qui sera appelé a chaque fois readyState est change 
        if (xhr.readyState === 4) {
            $("#result").html(xhr.responseText); // ajouter la reponse de la requete dans div qui a id result.    
          }
      }
      xhr.open('GET', "Ajaxdispatcher.php?action=Ajaxvoyage&depart="+villeDepart+"&arrivee="+villeArrivee+"&nbre_passagers="+nbre_passagers+"", true)//preparation de la requete.
      xhr.send(null)//envoie de la requete 
    })

})

