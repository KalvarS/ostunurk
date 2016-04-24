var kuulutus = null;
function viimaneLisatudKuulutus(){
    
    
    if(window.location.origin == "http://ostunurk.cs.ut.ee"){ // peame olema esilehel
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState = 4 && xhttp.status == 200) {
					if(xhttp.responseText != "" && xhttp.responseText != kuulutus){ // uus kuulutus on lisatud
					    kuulutus = xhttp.responseText;
				            document.getElementById("viimane_kuulutus").innerHTML = kuulutus;
					}
				}
			}
	                xhttp.open("GET", "http://ostunurk.cs.ut.ee/index.php/item/dataPush", true);
			xhttp.send();
  
    } else {
        kuulutus = null; 
    }
    
}
var interval = setInterval(viimaneLisatudKuulutus, 3000);