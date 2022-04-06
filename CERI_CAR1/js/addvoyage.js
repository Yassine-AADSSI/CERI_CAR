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
    $('#publier').submit(function(e){
        e.preventDefault();//// Annulez l'action par défaut du formulaire.
         //récupérer les données saisies dans le formulaire
        var villeDepart = $("#depart").val();
        var villeArrivee = $("#arrivee").val();
        var nbre_place = $("#exampleFormControlSelect1").val();
        var heureDepart = $("#heureDepart").val();
        var PrixParKm = $("#prixParKm").val();
        var contraintes = $("#contraintes").val();
        var heureDepart = $("#heureDepart").val();
        var xhr = getHttpRequest();// Appel a la methode qui instancie l'objet AJAX 
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
               
                $("#result").html(xhr.responseText);
                
          }
        }
      //preparation de la requete   
      xhr.open('GET', "Ajaxdispatcher.php?action=AjaxAddVoyage&depart="+villeDepart+"&arrivee="+villeArrivee+"&nbre_passagers="+nbre_place+"&heureDepart="+heureDepart+"&PrixParKm="+PrixParKm+"&contraintes="+contraintes+"", true)
      //envoie de la requete.
      xhr.send(null)
    })

})
