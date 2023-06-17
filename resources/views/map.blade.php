<!DOCTYPE html>
<html>
<head>
    <title>Real-time Location Map</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Real-time Location Map</h1>

    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsFCHiUGGJBD7yAZR1kWH8tXOTFN0nflM"></script>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 8
            });
        }

        function updateLocation() {
            var address = 'Dhaka, Bangladesh'; // Replace with the dynamic address

            // Send a GET request to retrieve the latitude and longitude
            fetch("{{ route('map.getLocation') }}?address=" + address)
                .then(response => response.json())
                .then(data => {
                    if (data.latitude && data.longitude) {
                        var location = new google.maps.LatLng(data.latitude, data.longitude);
                        map.setCenter(location);
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }

        initMap();
        setInterval(updateLocation, 5000); // Update location every 5 seconds
    </script>
</body>
</html>
