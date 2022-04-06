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







$(document).ready(function() {

    $('body').on('click','.btn1',function (event) {
        
        var voyage = $(this).data("index");
        var nbre_passagers = $(this).data("nbre_passagers");
        console.log(nbre_passagers);
        
        var xhr = getHttpRequest();  
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                  $("#content").html(xhr.responseText);         
            }
        }
        xhr.open('GET', "Ajaxdispatcher.php?action=ReserverVoyage"+"&"+voyage+"&nbre_passagers="+nbre_passagers+"", true)
        xhr.send(null)
    });
});

