<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Belajar Info windows</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <!-- elemen untuk menampilkan peta -->
    <div id="mapreposisi" style="height:100%;"></div>


    <script>
        function initMap() {


            // membuat objek peta
            var mapreposisi = new google.maps.Map(document.getElementById('mapreposisi'), {
                zoom: 9,
                center: {
                    lat: -8.352553338128352,
                    lng: 115.90582912063248
                }
            });


            const script = document.createElement("script");

              script.src =
                "http://localhost/maps/data.json";
              document.getElementsByTagName("head")[0].appendChild(script);
            



            //// DATA 3 //
            var data2 = {
                lat: -8.35325789882126,
                lng: 115.24945007665592
            };

            // membuat objek info window
            var infowindow2 = new google.maps.InfoWindow({
                content: "<h2>Hello Bali!</h2>",
                position: data2
            });

            // membua
            var marker2 = new google.maps.Marker({
                position: data2,
                map: mapreposisi,
                title: 'Pulau Bali'
            });

            marker2.addListener('click', function() {
                // tampilkan info window di atas marker
                infowindow2.open(mapreposisi, marker2);
            });




            const flightPlanCoordinates = [{
                    lat: -8.35325789882126,
                    lng: 115.24945007665592
                },
                {
                    lat: -7.913809383221543,
                    lng: 115.78799589736425
                },

            ];

            const flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            flightPath.setMap(mapreposisi);

        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN9D3kjoY6amHei1ZDeNIdNSLlY6kbitQ&callback=initMap">
    </script>
</body>

</html>