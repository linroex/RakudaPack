<!DOCTYPE html>
<html lang="en">
<head>
    @include('part.header', ['title'=>'地圖'])
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <style>
        html, body, #map{
            width: 100%;
            height: 100%;
            margin: 0;
        }
    </style>
    <script>
        var map;
        var geocoder;
        var paths = ["台中高鐵站", "台中火車站", "國立台灣科技大學"];
        var infocontent = ["台中高鐵站", "台中火車站", "國立台灣科技大學"];
        var bounds;
        function map_init() {
            var options = {
                zoom: 12,
                center: new google.maps.LatLngBounds(-34, 150)
            };
            map = new google.maps.Map(document.getElementById('map'), options);
            geocoder = new google.maps.Geocoder();
            bounds = new google.maps.LatLngBounds();
            map_geocoder(0);
        }
        function map_geocoder(index){
            geocoder.geocode({'address': paths[index]}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    add_marker(results[0].geometry.location, infocontent[index]);
                    // map.setCenter(results[0].geometry.location);
                    bounds.extend(results[0].geometry.location);
                }
                map.fitBounds(bounds);
                if (index < paths.length) {
                    map_geocoder(index+1);
                }
            });

        }
        function add_marker(position, content) {
            var marker = new google.maps.Marker({
                position: position,
                map: map
            });
            var infowindow = new google.maps.InfoWindow({
                content: content
            });
            google.maps.event.addListener(marker, 'click', function(){
                infowindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', map_init);
    </script>
</head>
<body>
    <div id="map"></div>
</body>
</html>