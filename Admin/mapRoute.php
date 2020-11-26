	
	<script>
		// CONVERT DATA LOKASI DARI VARIABEL PHP KE JS
		var latitude 		= <?php echo $latitude; ?>;
		var longtitude 		= <?php echo $longtitude;?>;

		var latCON 			= <?php  echo $simpanLOC['deliver_to_lat'];?>;
		var lngCON 			= <?php  echo $simpanLOC['deliver_to_long'];?>;
		function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15.7,
          center: {lat: latitude, lng:longtitude },
          
        });
        directionsDisplay.setMap(map);

        
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: { lat:latitude , lng:longtitude},
         
          destination: { lat:latCON , lng:lngCON},
          travelMode: 'DRIVING',
         
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
	</script>

	
