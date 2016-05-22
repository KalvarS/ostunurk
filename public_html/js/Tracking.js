function watchlist(id){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					var response = xhttp.responseText;
						if(response > 0){ //on juba watchlistis
						    getLabel(1, id);
						    removeWatchlist(id);
						}else if(response == 0){
						    getLabel(0, id);
						    addWatchlist(id);
						}
				}
			}
			
	                xhttp.open("GET", "http://ostunurk.cs.ut.ee/index.php/item/isInWatchlist/" + id, true);
			xhttp.send();
			
			
}

function getLabel(is_add_label, id){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
						if(xhttp.readyState == 4 && xhttp.status == 200) {
						var response = xhttp.responseText;
							document.getElementById(id).innerHTML = response;
		    
						}

			}
			
	                xhttp.open("GET", "http://ostunurk.cs.ut.ee/index.php/item/getWatchlistLabel/" + is_add_label, true);
			xhttp.send();				  
}


function addWatchlist(id){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
						if(xhttp.readyState == 4 && xhttp.status == 200) {					    
						}

			}
			
	                xhttp.open("GET", "http://ostunurk.cs.ut.ee/index.php/item/addWatchlist/" + id, true);
			xhttp.send();				  
}

function removeWatchlist(id){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if(xhttp.readyState == 4 && xhttp.status == 200) {
								    }

			}
			
	                xhttp.open("GET", "http://ostunurk.cs.ut.ee/index.php/item/removeWatchlist/" + id, true);
			xhttp.send();				  
}
