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


	var neighborhoods = [
	  {lat: 52.511, lng: 13.447},
	  {lat: 52.549, lng: 13.422},
	  {lat: 52.497, lng: 13.396},
	  {lat: 52.517, lng: 13.394}
	];

	var markers = [];
	var map;

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

	function drop() {
	  clearMarkers();
	  for (var i = 0; i < neighborhoods.length; i++) {
	    addMarkerWithTimeout(neighborhoods[i], i * 200);
	  }
	}

	function addMarkerWithTimeout(position, timeout) {
	  window.setTimeout(function() {
	    markers.push(new google.maps.Marker({
	      position: position,
	      map: map,
	      animation: google.maps.Animation.DROP
	    }));
	  }, timeout);
	}

	function clearMarkers() {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(null);
	  }
	  markers = [];
	}

	$('#especialidade').change(function(){
		console.log("testes");
	});

	$('#localizacao').focusout(function(){
		console.log("teste2");
	});

	var typingTimer; // Identificador do timer
	var doneTypingInterval = 500;  // Tempo sem digitação para ativar a busca

	// Ativa o timer
	$('#nome').on('keyup', function () {
		clearTimeout(typingTimer);
		typingTimer = setTimeout(buscarMedico, doneTypingInterval);
	});

	// Re-seta o timer
	$('#nome').on('keydown', function () {
		clearTimeout(typingTimer);
	});

	// Faz a busca
	function buscarMedico(){

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
					geocoder = new google.maps.Geocoder();

					var uluru = {lat: 0, lng: 0};

					$('#row-medico').fadeOut('slow',function(){
						var mapOptions = {
							center: uluru,
							zoom: 14,
						}

						var map = new google.maps.Map(document.getElementById('map'), mapOptions);

						var string ="";

						$.each(data, function( index, value ) {
							var address = value.endereco + ", " + value.numero + ", " + value.cidade;
							geocoder.geocode({'address': address}, function(results, status) {
    							if (status === google.maps.GeocoderStatus.OK) {
      								map.setCenter(results[0].geometry.location);
      								var marker = new google.maps.Marker({
        								map: map,
        								position: results[0].geometry.location
      								});
    						} else {
      							console.log('Geocode was not successful for the following reason: ' + status);
    						}
  						});

							   string += '<div class="col-sm-6 col-md-4"><div class="thumbnail">';
			                   string += '<img src="http://oregionalpr.com.br/wp-content/uploads/2013/08/istock_000019133180medium.jpg" alt="...">';
			                   string += '<div class="caption"><h3>' + value.nome + '</h3><p>Info do médico</p><p><a href="' + baseUrl + '/medico/' + value.crm + '" class="btn btn-primary" role="button">Ver Médico</a></p></div></div></div>'

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
	}


	$('#avaliar-btn').click(function(){
		$('#black-filter').fadeIn('slow',function(){
			$('#avaliar-box').fadeIn();
		});
	});


	$('#avaliar-box-fechar-btn').click(function(){
		$('#avaliar-box').fadeOut('slow',function(){
			$('#black-filter').fadeOut('slow');
		});
	});

	$("#avaliar-box-enviar-btn").click(function(){
		$('#avaliacao-medico').submit();
	});

	$("#drop").click(function(){
		drop();
	});

});
