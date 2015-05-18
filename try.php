
<html>
<head>
  <script src="javascripts/jquery-2.1.0.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
  <style type="text/css">
  

  </style>
</head>
<body>
 
 <div class="map">
 	

 </div>

</body>
</html>