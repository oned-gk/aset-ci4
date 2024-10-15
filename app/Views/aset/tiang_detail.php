<?php if ($daftar_tiang !== []): ?>

    <?php foreach ($daftar_tiang as $tiang_item): ?>
        <p>
        <h3> <?= esc($tiang_item['no_tiang']) ?></h3>
        ID : <?= esc($tiang_item['id_tiang']) ?><br>
       
        Latitude : <?= esc($tiang_item['latitude']) ?><br>
        Longitude : <?= esc($tiang_item['longitude']) ?>
        </p>
       
    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>

<style type="text/css">
#map_wrapper {
    height: 100%;
    width: 100%;
}

#map_canvas {
    width: 100%;
    height: 100%;
}

.markerLink {
	color: #333;
	text-decoration: none;
	padding: 0px;
	margin: 0px;
	font-size: 10px;
}
</style>
<script>
jQuery(function($) {
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };

    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    var markers = [
        <?php if ($daftar_tiang !== []): ?>
    <?php foreach ($daftar_tiang as $tiang_item): ?>
        ['<?= esc($tiang_item['no_tiang']) ?>',<?= esc($tiang_item['latitude']) ?>,<?= esc($tiang_item['longitude']) ?>],
    <?php endforeach ?>
<?php else: ?>
<?php endif ?>
       
    ];

    var url = 'https://www.expedia.com/Flight-Search-Disambiguation?inpPackageType=FLIGHT_ONLY&inpInfants=2&origref=null&inpArrivalTimes=362&inpArrivalDates=02%2F10%2F2016&inpFlightClass=3&inpDepartureDates=01%2F30%2F2016&inpDepartureTimes=362&inpFlightRouteType=2&inpHotelRoomCount=1&inpFlightAirlinePreference=&inpAdultCounts=1&inpIsNonstopOnly=N&intcp=0&inpChildCounts=0&inpSeniorCounts=0&action=FlightSearchAll%40searchFlights&inpRefundableFlightsOnly=N&inpSortType=0&inpDepartureLocations=KTM&inpArrivalLocations=JFK&';
    
    for( i = 0; i < markers.length; i++ ) {
    	var infoWindow = new google.maps.InfoWindow(), marker, i;
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        var image = "../assets/images/logokecil.png";
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0],
            icon: {url:image, labelOrigin: { x: 20, y: -10},},
            label: {text:markers[i][0],color:'white',fontSize: '16px',},            
        });

        var link = "<a href='"+url+"'' target='_blank' class='markerlink'>$"+markers[i][3]+"</a>";

        google.maps.event.addListener(marker, 'click', function() {
		    window.open(url, '_blank');
		});

        infoWindow.setContent(link);
        // infoWindow.open(map, marker);
        map.fitBounds(bounds);
    }    
}
</script>