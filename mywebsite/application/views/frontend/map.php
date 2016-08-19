<!DOCTYPE html>
<html>
	<head>
		<script
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
		</script>

		<script>
		var myCenter=new google.maps.LatLng(1.279520, 103.840286);

		function initialize()
		{
		var mapProp = {
		  center: myCenter,
		  zoom:16,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		  };

		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker = new google.maps.Marker({
		  position: myCenter,
		  title:'Click to zoom'
		  });

		marker.setMap(map);

		// Zoom to 9 when clicking on marker

		     
		google.maps.event.addListener(map,'click',function() {
		// 3 seconds after the center of the map has changed, pan back to the marker
		  window.setTimeout(function() {
		    map.panTo(marker.getPosition());
		  },0);
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<style>
			#googleMap{
				width: 500px;
				height: 500px;
				
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<div id="googleMap">
			
		</div>
	</body>
</html>