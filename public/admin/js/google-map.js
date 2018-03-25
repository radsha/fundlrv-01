        var map;
        var markersArray = [];

        function initMap()
        {
		var getLat = $('input[name="lat"]').val();
		var getLon = $('input[name="lon"]').val();
		var getZoom = $('input[name="zoom"]').val();
		var gLat = getLat != '' ?  	parseFloat( getLat ) : 14.40062;
		var gLon = getLon != '' ? 	parseFloat( getLon ) : 100.72136;
		var gZoom = getZoom != '' ? 	parseFloat( getZoom ) : 16;
		var myLatLng 	= { lat: gLat, lng: gLon };
		console.log(myLatLng);
		var latlng 		= new google.maps.LatLng(gLat, gLon);
        var myOptions 	= {
                zoom: gZoom,
                center: myLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
		map = new google.maps.Map(document.getElementById("map"), myOptions);

            // add a click event handler to the map object
        google.maps.event.addListener(map, "click", function(event){
                // place a marker
                placeMarker(event.latLng);

                // display the lat/lng in your form's lat/lng fields
                document.getElementById("lat").value = event.latLng.lat();
                document.getElementById("lon").value = event.latLng.lng();
                document.getElementById("zoom").value = map.getZoom();
            });
			/*=========================================================================================================================*/
		  	var marker = new google.maps.Marker({
							position: myLatLng,
							map: map,
							//title: '{{ $item->name }}',
							draggable : true
					});
					google.maps.event.addListener(marker, 'dragend', function(a) {
							console.log(a);
							var newLat = a.latLng.lat().toFixed(4);
							var newLon = a.latLng.lng().toFixed(4);								
					});
		  
			var input = document.getElementById('pac-input');
			var searchBox = new google.maps.places.SearchBox(input);
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
				map.addListener('bounds_changed', function() {
					searchBox.setBounds(map.getBounds());
				});
				
				searchBox.addListener('places_changed', function() {
					var places = searchBox.getPlaces();

					if (places.length == 0) {
						return;
					}
					
					// For each place, get the icon, name and location.
					var bounds = new google.maps.LatLngBounds();
						places.forEach(function(place) {
							if (!place.geometry) {
								console.log("Returned place contains no geometry");
								return;
							}
			
							if (place.geometry.viewport) {
								// Only geocodes have viewport.
								bounds.union(place.geometry.viewport);
							} else {
								bounds.extend(place.geometry.location);
							}
							
						});
						map.fitBounds(bounds);
				});
							

        }
        function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map,
				draggable : true
            });

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
$(function() {
	$('#pac-input').on('keypress',function(e){
		if(e.which == 13) {
			//alert('You pressed enter!');
			e.preventDefault();
		}
	});
});