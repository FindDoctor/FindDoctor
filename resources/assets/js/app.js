require('./bootstrap');

function initMap(latitude, longitude) {
	var uluru = {lat: latitude, lng: longitude};

	console.log(uluru);

	var mapOptions = {
		center: uluru,
		zoom: 14,
	}

	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var markerOptions = {
		position: uluru,
		map: map,
		title: "Sua localização"
	}

	var marker = new google.maps.Marker(markerOptions);
}


$(document).ready(function () {
	if (navigator.geolocation)
		navigator.geolocation.getCurrentPosition(function (position) {
			initMap(position.coords.latitude, position.coords.longitude);
		},
		function () {
			initMap(-15.7217509, -48.0082761);
		});
	else
		initMap(-48.0082761,-15.7217509);
});
