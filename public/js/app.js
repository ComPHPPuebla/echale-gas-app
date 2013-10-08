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

	var initialLocation, map, myOptions;
	
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

    	var stations = markers._embedded.stations;
    	var count = stations.length;
    	for (var i = 0; i < count; i++) { 

    		var iconGasStation = new google.maps.MarkerImage("img/marker.png", null, null, null, new google.maps.Size(23,36));
    	
	    	var gasStationMarker = new google.maps.Marker({
			      position: new google.maps.LatLng(stations[i].latitude, stations[i].longitude),
			      map: map,
			      icon: iconGasStation,
			      title: stations[i].name
			});
	
	        var infoWindow = new google.maps.InfoWindow({ 
				content: $('#tooltips').html()
			});
	
			google.maps.event.addListener(gasStationMarker, 'mouseover', function() { 
				infoWindow.open(map, gasStationMarker); 
			});
    	}

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