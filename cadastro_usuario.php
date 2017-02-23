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
      .invisivel{
        display: none;
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
                      <label>DADOS</label>
              		 	  	  <div class="form-group">
              		 	  	  	  <select name="sexo" class="form-control" requiride>
              		 	  	  	  	     <option value="">Sexo</option>
              		 	  	  	  	     <option value="m">Masculino</option>
              		 	  	  	  	     <option value="f">Feminino</option>
              		 	  	  	  	     <option value="o">Outros</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="idade" class="form-control" requiride>
              		 	  	  	  	     <option value="">Idade</option>
              		 	  	  	  	     <option value="15-20">15-20</option>
              		 	  	  	  	     <option value="20-25">20-25</option>
              		 	  	  	  	     <option value="25-30">25-30</option>
              		 	  	  	  	     <option value=">30">>30</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="renda" class="form-control" requiride>
              		 	  	  	  	     <option value="">Renda</option>
              		 	  	  	  	     <option value="1">1 SM</option>
              		 	  	  	  	     <option value="2">2 SM</option>
              		 	  	  	  	     <option value="3">3 SM</option>
              		 	  	  	  	     <option value=">3">> 3 SM</option>
              		 	  	  	  </select>
              		 	  	  </div>

              		 	  	  <div class="form-group">
              		 	  	  	  <select name="escolaridade" class="form-control" requiride>
              		 	  	  	  	     <option value="">Escolaridade</option>
              		 	  	  	  	     <option value="fundamental">Fundamental</option>
              		 	  	  	  	     <option value="medio">Medio</option>
              		 	  	  	  	     <option value="superior">Superior</option>
              		 	  	  	  </select>
              		 	  	  </div>

                          <label>LOCALIZAÇÂO</label>

                          <div class="form-group log-status">
                            <input id="address" type="textbox" class="form-control" value="Cajazeiras, Brasil">
                          </div> 
                          <div>
                            <input id="submit" type="button"  class="btn btn-default" value="Geocode">
                          </div>
                          <div id="map"></div>

                          <div class="form-group log-status ">
                             <input type="text" class="form-control invisivel" name="lat" id="lat" required> 
                          </div>

                          <div class="form-group log-status ">
                             <input type="text"  class="form-control invisivel" name="lng" id="lng" required> 
                          </div>

              		 	  	  <label>DADOS DE ACESSO</label>

              		 	  	  <div class="form-group log-status">
              		 	  	  	 <input type="email" placeholder="Email" class="form-control" name="email" required> 
              		 	  	  </div>

              		 	  	  <div class="form-group log-status">
              		 	  	  	  <input type="password" class="form-control" placeholder="Senha" name="senha" required>
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


            // Try HTML5 geolocation.
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                document.getElementById('lat').value = pos.lat;
                document.getElementById('lng').value = pos.lng;
                placeMarkerAndPanTo(pos, map);
                            

              }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            }

            google.maps.event.addListener(map,'click',function(event) {
                 
             });

            map.addListener('click', function(e) {
              document.getElementById('lat').value = e.latLng.lat();
              document.getElementById('lng').value =  e.latLng.lng();
              placeMarkerAndPanTo(e.latLng, map);
            });

            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function() {
              geocodeAddress(geocoder, map);
            });
          }

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Error: The Geolocation service failed.' :
                                  'Error: Your browser doesn\'t support geolocation.');
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