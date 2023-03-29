<html>

<head>
    <title>Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style type="text/css">
        #map {
            height: 100%;
        }

        /*
         * Optional: Makes the sample page fill the window.
         */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body>
    <div id="map"></div>

    <script type="text/javascript">
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: new google.maps.LatLng(-4.926373265240449, 105.01915962173678),
                mapTypeId: "terrain",
            });
            // Create a <script> tag and set the USGS URL as the source.
            const script = document.createElement("script");

            // This example uses a local copy of the GeoJSON stored at
            // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
            script.src =
                "http://localhost/yoservices/api/reposisi/maps/42";
            document.getElementsByTagName("head")[0].appendChild(script);
        }

        // Loop through the results array and place a marker for each
        // set of coordinates.
        const eqfeed_callback = function(results) {

            var flightPlanCoordinates = [];
            for (let i = 0; i < results.features.length; i++) {

                const latLng = new google.maps.LatLng(results.features[i].properties.latitude, results.features[i].properties.longitude);
                var longitudes = parseFloat(results.features[i].properties.longitude);

                var latitudes = parseFloat(results.features[i].properties.latitude);

                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                });

                const contentString = results.features[i].properties.jam;

                infoWindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.open(map, marker);
                });

                google.maps.event.trigger(marker, 'click');



                flightPlanCoordinates.push({
                    lat: latitudes,
                    lng: longitudes
                });

            }



            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            flightPath.setMap(map);



        };
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN9D3kjoY6amHei1ZDeNIdNSLlY6kbitQ&callback=initMap&v=weekly"
        defer></script>
</body>

</html>
