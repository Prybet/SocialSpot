<html>
  <head>
    <title>Maps SocialSpot</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="../css/grupe8Style.css" />
    <script src="../js/map.js"></script>
  </head>
  <body>
    <div id="map"></div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=KEY&callback=initMap&v=weekly"
      defer
    ></script>
  </body>
</html>