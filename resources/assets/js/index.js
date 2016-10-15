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
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

		$.ajax({
			url: baseUrl + '/carregamedicos',
			type: 'POST',
			data: $('#filtros-home').serialize(),
			dataType: 'json',
			success: function(data) {

				$('#row-medico').fadeOut('slow',function(){
						var string ="";

						$.each(data, function( index, value ) {

						   string += '<div class="col-sm-6 col-md-4"><div class="thumbnail">';
		                   string += '<img src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg" alt="...">';
		                   string += '<div class="caption"><h3>' + value.nome + '</h3><p>Info do médico</p><p><a href="#" class="btn btn-primary" role="button">Ver Médico</a></p></div></div></div>'

						});
						$('#row-medico').html(string);
				});

				$('#row-medico').fadeIn('slow');
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
