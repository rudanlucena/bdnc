<html>
<head>
      <title>BDNC</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="UTF-8">
      <link href="bootstrap-3.7/css/bootstrap.css" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/templatemo_style.css">
      <script src="js/jquery-1.10.2.min.js"></script>
      <style>
        #map {
          width: 100%;
          height: 300px;
          margin-bottom: 20px;
          margin-top: 20px;
         
      }
    </style>
</head>      
<body>
      <div class="bg-image"></div>
      <div class="main-content">
          <div class="container">
              <div class="row">
              	<div class="col-md-12">

              		 <form action="insert_usuario.php" method="post">
              		 	  <div class="login-form">
              		 	  	  <div class="form-group">
              		 	  	  	  <select name="sexo" class="form-control" requiride>
              		 	  	  	  	     <option value="">sexo</option>
              		 	  	  	  	     <option value="m">MASCULINO</option>
              		 	  	  	  	     <option value="f">FEMININO</option>
              		 	  	  	  	     <option value="o">OUTRO</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="idade" class="form-control" requiride>
              		 	  	  	  	     <option value="">idade</option>
              		 	  	  	  	     <option value="15-20">15-20</option>
              		 	  	  	  	     <option value="20-25">20-25</option>
              		 	  	  	  	     <option value="25-30">25-30</option>
              		 	  	  	  	     <option value=">30">>30</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="renda" class="form-control" requiride>
              		 	  	  	  	     <option value="">renda</option>
              		 	  	  	  	     <option value="1">1 sm</option>
              		 	  	  	  	     <option value="2">2 sm</option>
              		 	  	  	  	     <option value="3">3 sm</option>
              		 	  	  	  	     <option value=">3">> 3 sm</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="escolaridade" class="form-control" requiride>
              		 	  	  	  	     <option value="">escolaridade</option>
              		 	  	  	  	     <option value="fundamental">fundamental</option>
              		 	  	  	  	     <option value="medio">medio</option>
              		 	  	  	  	     <option value="superior">superior</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	 <input id="botaoLocalizacao" type="button" class="btn"  placeholder="localizacao" value="localização" required>
              		 	  	  </div>

                          <div class="form-group log-status">
                            <input id="address" type="textbox" class="form-control" value="Cajazeiras, Brasil">
                          </div> 
                          <div>
                            <input id="submit" type="button"  class="btn" value="Geocode">
                          </div>
                          <div id="map"></div>

                          <div class="form-group log-status">
                             <input type="text" placeholder="latitude" class="form-control" name="lat" id="lat" required> 
                          </div>

                          <div class="form-group log-status">
                             <input type="text" placeholder="longitude" class="form-control" name="lng" id="lng" required> 
                          </div>

              		 	  	  <label>DADOS DE ACESSO</label>

              		 	  	  <div class="form-group log-status">
              		 	  	  	 <input type="email" placeholder="email" class="form-control" name="email" required> 
              		 	  	  </div>

              		 	  	  <div class="form-group log-status">
              		 	  	  	  <input type="password" class="form-control" placeholder="senha" name="senha" required>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	 <button class="log-btn">SALVAR</button>
              		 	  	  </div>
              		 	  </div>
              		 </form>
                                

              	</div><!--/.col-md-12-->
              </div><!--/.row-->	
          </div><!--/.container-->
      </div><!--/.main-content--> 

      <script>
          var marker;
          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 14,
              center: {lat: -6.889797, lng: -38.561197}
            });

            google.maps.event.addListener(map,'click',function(event) {
                 document.getElementById('lat').value = event.latLng.lat()
                 document.getElementById('lng').value =  event.latLng.lng()
             });

            map.addListener('click', function(e) {
              placeMarkerAndPanTo(e.latLng, map);
            });

            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function() {
              geocodeAddress(geocoder, map);
            });
          }

          function placeMarkerAndPanTo(latLng, map) {
            if(marker != undefined && marker != ''){
              marker.setMap(null);
              marker = '';
            } 
            marker = new google.maps.Marker({
              position: latLng,
              map: map
            });
            map.panTo(latLng);
          }


          $("#botaoLocalizacao").click(function(){
              $("#map").show();
          });

          function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
              if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location
                });
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });
          }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6uep-fiBCnkiN69txzM-3UxT7rBfMnN8&callback=initMap"
        async defer>
    </script>

</body>
</html>      