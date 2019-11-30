<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Mapa de rota</title>
    <style>
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        display: none;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <select id="mode">
      <option value="DRIVING">Dirigindo</option>
    </select>
    </div>
    <div id="map"></div>
    <!--Seguinte, nas 4 variáveis abaixo, se colocam os valores das geolocalizações.
      em ordem: latitude de origem, longitude de origem, latitude de destino, longitude de destino. Resumindo: latitude e longitude do veículo e latitude e longitude do lugar de entrega.
      -->

    <script>
      var lator = 37.70;
      var longor = -122.400;
      var latdes = 37.768;
      var londes = -122.511;

      function initMap() {
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: lator, lng: longor}
        });
        infoWindow = new google.maps.InfoWindow;
        directionsRenderer.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsRenderer);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
          origin: {lat: lator, lng: longor},  // Haight.
          destination: {lat: latdes, lng: londes},  // Ocean Beach.
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsRenderer.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADLsL46CQaEu2smB3EMpEV1eEbInd0ASs&callback=initMap">
    </script>
  </body>
</html>