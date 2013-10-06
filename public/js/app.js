$(document).ready(function(){

	$('#hide-content').click(function(){
		$('#container').animate({
			bottom: $('#container').height() * -1
		});
		$('#hide-content').hide();
		$('#show-content').show();
	});

	$('#show-content').click(function(){
		$('#container').animate({
			bottom: '0px'
		});
		$('#show-content').hide();
		$('#hide-content').show();
	});


	//-----   Google Maps   -----

	var initialLocation, map, myOptions, marker;
	//var myLatlng = new google.maps.LatLng(19.0441024, -98.1980115);

    navigator.geolocation.getCurrentPosition(function(position) {
      	initialLocation = new google.maps.LatLng(19.0441024, -98.1980115); //new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    	myOptions = {
			zoom: 15,
			center: initialLocation,
		    mapTypeControl: false,
		    panControl: true,
		    panControlOptions: {
		        position: google.maps.ControlPosition.RIGHT_CENTER
		    },
		    zoomControl: true,
		    zoomControlOptions: {
		      	style: google.maps.ZoomControlStyle.SMALL,
    			position: google.maps.ControlPosition.RIGHT_CENTER
		    },
  			draggable: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

    	map = new google.maps.Map($("#global-map").get(0), myOptions);
    	map.panBy(0, 200);
    	marker = new google.maps.Marker({
			position: initialLocation,
			map: map,
			title:"¡Estas aquí!"
		});

    	var icon_colegio = new google.maps.MarkerImage("img/marker.png", null, null, null, new google.maps.Size(23,36));
		var colegioMarker = new google.maps.Marker({
		      position: new google.maps.LatLng(19.0448085, -98.1943929),
		      map: map,
		      icon: icon_colegio,
		      title: "Fulanito S.A. de C.V."
		});

        var infoWindow = new google.maps.InfoWindow({ 
			content: $('#tooltips').html()
		});

		google.maps.event.addListener(colegioMarker, 'mouseover', function() { 
			infoWindow.open(map, colegioMarker); 
		});

		// Resize stuff...
		google.maps.event.addDomListener(window, "resize", function() {
			var center = map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);
		});
    }, function() {
      	console.log("algo");
    });

});