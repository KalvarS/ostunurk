function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(58.37824850000001,26.71467329999996),
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  	marker = new google.maps.Marker({
		map: map,position: new google.maps.LatLng(58.37824850000001,26.71467329999996)
	});
	infowindow = new google.maps.InfoWindow({
		content:'<br>Juhan Liivi 2<br>'
	});

	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});

	infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);