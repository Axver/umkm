<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.js"></script>
  <div style='height:100%;' id="mapid"></div>

    <script>
    var test= <?php echo $geom; ?>;
    var padang=<?php echo $padang; ?>;
  
    console.log(test);

    console.log(test[0]);

    var style={
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.3,
                fillColor: '#666666'
    }

    var styleall={
      weight: 2,
                opacity: 0.1,
                color: 'yellow',
                dashArray: '3',
                fillOpacity: 0.3,
                fillColor: 'blue'
    }

    var mymap = L.map('mapid').setView([-0.919432, 100.449392], 8);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqOXNxdHF4bjBzb2czM2p6cmVzZzBwcXgifQ.l38Ez-rF1XCin25iUIynoQ'
}).addTo(mymap);
// layer=L.control.layers().addTo(mymap);

var drawnItems = new L.FeatureGroup();
     mymap.addLayer(drawnItems);
     var drawControl = new L.Control.Draw({
         edit: {
             featureGroup: drawnItems
         }
     });
     mymap.addControl(drawControl);

//  mymap.on('draw:created', function (e) {
    // Do whatever else you need to. (save to db, add to map etc)
    // map.addLayer(layer);
    // console.log("Test");
// });




mymap.on('draw:created', function (e) {

    var type = e.layerType,
        layer = e.layer;

    if (type === 'rectangle') {
        layer.on('mouseover', function() {
            // alert(layer.getLatLngs());    
        });
    }

    drawnItems.addLayer(layer);
});






   L.geoJSON(test,{
     style:styleall
   }).addTo(mymap);
   L.geoJSON(padang, {
            style: style
            
        }).addTo(mymap);


   

    </script>
