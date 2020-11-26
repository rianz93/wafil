<div id="panel">
    <input type="text" id="slectedLat" value="32.715738"></input>
    <input type="text" id="slectedLon" value="-117.1610838"></input>
</div>
<div id="selected_map_canvas"></div>
<div id="directions-panel"></div>
<div id="map"></div>
<style>html, body, #selected_map_canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
}</style>

<script>// 32.715738, -117.1610838
// 40.7127837, -74.0059413
var mylatitude = 40.7127837;
var mylongitude = -74.0059413;

function GoogleMap_selected() {

    var lattitude_value = document.getElementById('slectedLat').value;
    var longitude_value = document.getElementById('slectedLon').value;

    var from = new google.maps.LatLng(mylatitude, mylongitude);
    var to = new google.maps.LatLng(lattitude_value, longitude_value);

    var directionsService = new google.maps.DirectionsService();
    var directionsRequest = {
        origin: from,
        destination: to,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC
    };

    this.initialize = function () {
        var map = showMap_selected();

        directionsService.route(
        directionsRequest,

        function (response, status) {

            if (status == google.maps.DirectionsStatus.OK) {
                new google.maps.DirectionsRenderer({
                    map: map,
                    directions: response,
                    suppressMarkers: true
                });
                var leg = response.routes[0].legs[0];
                makeMarker(leg.start_location, icons.start, "title", map);
                makeMarker(leg.end_location, icons.end, 'title', map);

            } else {
                alert("Unable to retrive route");
            }

        });

    }

    function makeMarker(position, icon, title, map) {
        new google.maps.Marker({
            position: position,
            map: map,
            icon: icon,
            title: title
        });
    }

    var icons = {
        start: new google.maps.MarkerImage(
        // URL
        'http://maps.google.com/mapfiles/ms/micons/blue.png',
        // (width,height)
        new google.maps.Size(44, 32),
        // The origin point (x,y)
        new google.maps.Point(0, 0),
        // The anchor point (x,y)
        new google.maps.Point(22, 32)),
        end: new google.maps.MarkerImage(
        // URL
        'http://maps.google.com/mapfiles/ms/micons/green.png',
        // (width,height)
        new google.maps.Size(44, 32),
        // The origin point (x,y)
        new google.maps.Point(0, 0),
        // The anchor point (x,y)
        new google.maps.Point(22, 32))
    };


    var showMap_selected = function () {
        var mapOptions = {
            zoom: 12,
            center: new google.maps.LatLng(lattitude_value, longitude_value),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("selected_map_canvas"), mapOptions);
        return map;
    };
}

function initialize() {
    var instance = new GoogleMap_selected();
    instance.initialize();
}

google.maps.event.addDomListener(window, 'load', initialize);</script><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkPuqqypzKAmNSLLbwNg8yOX6dWfTPQm4&callback=initMap"
    async defer></script>