	<script>
		// CONVERT DATA LOKASI DARI VARIABEL PHP KE JS
		var latitude 		= <?php echo $latitude; ?>;
		var longtitude 		= <?php echo $longtitude;?>;

		function initMap(){
			var options = {
				zoom:15.7,
				center:{lat:latitude, lng:longtitude}
			}

			var map = new google.maps.Map(document.getElementById('map'), options);

			// DEPE MARKER
			addMarker({
				coords:{lat:latitude, lng:longtitude},
				content:'<h4><?php echo "Toko ".$data_toko['user_first_name'] ; ?></h4>'
			});

			
			// DEPE FUNGSI MARKER
			function addMarker(props){
				var marker = new google.maps.Marker({
				position:props.coords,
				map:map,
				icon:'assets/drawable/marker2.png'
				});

				// KALO MO KLIK MARKER KLUAR INFO
				if (props.content) {
					var infoWindow = new google.maps.InfoWindow({
					content:props.content
					});

					marker.addListener('click', function(){
					infoWindow.open(map, marker);
					toggleBounce();
					});

				function toggleBounce() {
					  if (marker.getAnimation() !== null ) {
					    marker.setAnimation(null);
					  } else {
					    marker.setAnimation(google.maps.Animation.BOUNCE);
					  }
					}
				}
			}
		}
	</script>

	
