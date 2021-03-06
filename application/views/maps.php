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
    
    var padang=<?php echo $padang; ?>;
    var kecamatan=<?php echo $kecamatan; ?>;
    console.log(kecamatan);
  
    

  

    var style={
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.3,
                fillColor: 'blue'
    }

    var styleall={
      weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.1,
                fillColor: 'red'
    }

    var mymap = L.map('mapid').setView([-0.958867, 100.378054], 11);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqOXNxdHF4bjBzb2czM2p6cmVzZzBwcXgifQ.l38Ez-rF1XCin25iUIynoQ'
}).addTo(mymap);


var drawnItems = new L.FeatureGroup();
     mymap.addLayer(drawnItems);
     var drawControl = new L.Control.Draw({
         edit: {
             featureGroup: drawnItems
         }
     });
     mymap.addControl(drawControl);

var kode=1;
mymap.on('draw:created', function (e) {

     var type = e.layerType,
        layer = e.layer;

    mymap.addLayer(layer);
    
    if (type === 'marker') {    
        swal("Copy Lat Lng Popup Marker");
        layer.bindPopup('LatLng: ' + layer.getLatLng()).openPopup();
        
    }
    else if(type === 'polygon')
    {
        // console.log(layer.getLatLngs());   
        var datagambar = layer.toGeoJSON();
        convertedData = JSON.stringify(datagambar);
        var length= convertedData.length;
        var substr = convertedData.substr(80,length);
        var hapus_belakang=substr.slice(0,-5);
        // var replace=hapus_belakang.replace('],[','"')
        var res = hapus_belakang.replace(/],/gi, '"');
        var res1 = res.replace(/,/gi, ' ');
        var res2 = res1.replace(/]/gi, ' ');
        var res3= res2.replace(/\[/g,'');
        res4=res3.replace(/"/g,',');
        
        console.log(res4);
        data=layer.getLatLngs();
        // var lokasi=document.getElementById('polygon');
        // lokasi.innerHTML = data;
        // lokasi.values=data;

        var poli=document.getElementById('poli');
        poli.value=res4;
        mymap.removeLayer(layer);
        swal('DATA DISIMPAN'+'\nSilahkan klik polygon');
    }
    else{
        swal("Perintah hanya tersedia untuk fungsi marker");
        mymap.removeLayer(layer);
    }
    // drawnItems.addLayer(layer);
});


function off()
{
  
}



//    L.geoJSON(test,{
//      style:styleall
//    }).addTo(mymap);
   L.geoJSON(padang, {
            style: style
            
        }).addTo(mymap);
        L.geoJSON(kecamatan, {
            style: styleall
            
        }).addTo(mymap);



        function pantau_koordinat()
        {
            alert("test");
            mymap.on('mouseover', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                // alert ("Latitude : " + lat + "\nLongitude : " + lng);
                latlive=document.getElementById('latlive').value=lat;
                lonlive=document.getElementById('lonlive').value=lng;
            });
        }


   

    </script>
