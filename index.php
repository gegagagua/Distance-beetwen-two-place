<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1> Distance </h1>
	<span>FROM</span>
	<input type="text" name="country1" id="country1">
	<span>To</span>
	<input type="text" name="country2" id="country2">
	<button>Count</button>

	<div class="result">
		Metres: <span id="metr"></span> <br>
		<!-- Miles:	<span id="myle"></span> <br> -->
		Kilometers: <span id="km"></span>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry"></script>
	
	<script type="text/javascript">
		$('button').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			var country1 = $('#country1').val(),
				country2 = $('#country2').val();

				$.ajax({
					url: 'get_data.php',
					type: 'POST',
					data: {country1: country1,country2 : country2},
					success : function(data){
						console.log(data);
						var obj = jQuery.parseJSON( data );
							var latitude1  = obj.lat1;
							var longitude1 = obj.long1;
							var latitude2  = obj.lat2;
							var longitude2 = obj.long2;

							var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1,longitude1), new google.maps.LatLng(latitude2,longitude2)); 
							$('#metr').text( Math.round(distance) + "M" );
							$('#km').text( (Math.round(distance/1000 * 100))/100  + "KM" );
					}
				});
				
		});


		
	</script>
</body>
</html>