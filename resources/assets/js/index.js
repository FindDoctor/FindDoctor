$(document).ready(function () {
	if (navigator.geolocation)
		navigator.geolocation.getCurrentPosition(function (position) {
			initMap(position.coords.latitude, position.coords.longitude);
		},
		function () {
			initMap(-15.7217509, -48.0082761);
		});
	else
		initMap(-15.7217509, -48.0082761);





	$('#especialidade').change(function(){
		console.log("testes");
	});
	
	$('#localizacao').focusout(function(){
		console.log("teste2");
	});

	$('#nome').focusout(function(){
		$.ajax({
			url: 'http://localhost:8080/FindDoctor/public/carregamedicos',
			type: 'POST', 
			data: $('#filtros-home').serialize(), 
			dataType: 'json',
			beforeSend: function() {
				 
			},
			success: function(data) {
				console.log(data);
			},
			error: function(e) {
			},
			complete: function(e) {
			}
		});
	});


});


function initMap(latitude, longitude) {
	var uluru = {lat: latitude, lng: longitude};

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
