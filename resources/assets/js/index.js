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


	var neighborhoods = [];

	var markers = [];
	var map;
	var uluru;

	function initMap(latitude, longitude) {
		uluru = {lat: latitude, lng: longitude};

		var mapOptions = {
			center: uluru,
			zoom: 14,
		}

		map = new google.maps.Map(document.getElementById('map'), mapOptions);

		var markerOptions = {
			position: uluru,
			map: map,
			title: "Sua localização"
		}

		var marker = new google.maps.Marker(markerOptions);

		loadMarkers(map);
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
		buscarMedico(map);
	});

	$('#distancia').change(function(){
		buscarMedico(map);
	});

	var typingTimer; // Identificador do timer
	var doneTypingInterval = 500;  // Tempo sem digitação para ativar a busca

	// Ativa o timer
	$('#nome').on('keyup', function () {
		clearTimeout(typingTimer);
		typingTimer = setTimeout(function () {
			buscarMedico(map);
		}, doneTypingInterval);
	});

	// Re-seta o timer
	$('#nome').on('keydown', function () {
		clearTimeout(typingTimer);
	});

	// Faz a busca
	function buscarMedico(map){
		function deg2rad(deg) {
			return deg * (Math.PI/180)
		}
		clearMarkers();

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

					$('#row-medico').fadeOut('slow',function(){
						var markerOptions = {
							position: uluru,
							map: map,
							title: "Sua localização"
						}

						var marker = new google.maps.Marker(markerOptions);
						markers.push(marker);


						var string ="";

						$.each(data, function( index, value ) {
							var address = value.endereco + ", " + value.numero + ", " + value.cidade;
							geocoder.geocode({'address': address}, function(results, status) {
    							if (status === google.maps.GeocoderStatus.OK) {
									var lat1 = uluru.lat;
									var lat2 = results[0].geometry.location.lat();
									var lon1 = uluru.lng;
									var lon2 = results[0].geometry.location.lng();

									var R = 6371; // Radius of the earth in km
									var dLat = deg2rad(lat2-lat1);  // deg2rad below
									var dLon = deg2rad(lon2-lon1);
									var a =
    									Math.sin(dLat/2) * Math.sin(dLat/2) +
    									Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    									Math.sin(dLon/2) * Math.sin(dLon/2)
    									;
									var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
									var d = R * c; // Distance in km
									var d = R * c; // Distance in km

									if(d <= $('#distancia').val() || $('#distancia').val() == 0) {
										map.setCenter(results[0].geometry.location);
      									var marker = new google.maps.Marker({
        									map: map,
        									position: results[0].geometry.location,
											title: value.nome
      									});
										marker.addListener('click', function() {
                                            window.location.replace(baseUrl + '/medico/' + value.id);
                                        });
										markers.push(marker);
									}
    							} else {
      								console.log('Geocode was not successful for the following reason: ' + status);
    							}
  							});

							if(value.premium == 1)
								var golden = 'golden';
							else
								var golden = '';

							if(!value.foto)
								var foto = baseUrl + '/imgs/base_medico.jpg';
							else
								var foto = baseUrl + '/imgs/medicos/' + value.foto;

 							string += '<div class="col-sm-6 col-md-4"><div class="thumbnail ' + golden + '">';
			            	string += '<img src="'+ foto + '" alt="...">';
			            	string += '<div class="caption"><h3>' + value.nome + '</h3><p>Info do médico</p><p><a href="' + baseUrl + '/medico/' + value.id + '" class="btn btn-primary" role="button">Ver Médico</a></p></div></div></div>';

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

	function loadMarkers(map) {
		$.ajax({
			url: baseUrl + '/carregamarkers',
			type: 'POST',
			data: $('#filtros-home').serialize(),
			dataType: 'json',
			success: function(data) {
				geocoder = new google.maps.Geocoder();

				var uluru = {lat: 0, lng: 0};

				var mapOptions = {
					center: uluru,
					zoom: 14,
				}

				$.each(data, function( index, value ) {
					var latLng = {lat: parseInt(value.latitude), lng: parseInt(value.longitude)};
					var marker = new google.maps.Marker({
						map: map,
						position: latLng,
						title: value.nome
					});
					markers.push(marker);
				});
			},
			error: function(e) {
				console.log(e);
			},
			complete: function(e) {
			}
		});
	}

	loadMarkers();
});
