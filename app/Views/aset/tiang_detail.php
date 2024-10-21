<?php if ($daftar_tiang !== []): ?>
    <form action="<?= esc($daftar_tiang[0]['id']) ?>" method="post" class="d-inline">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2"><?= esc($title) ?></h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="<?= base_url('tiang/edit') . '/' . esc($daftar_tiang[0]['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <button type="submit" onclick="return confirm('Apakah Anda yakin')" class="btn btn-sm btn-outline-danger">Hapus</button>
                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('tiang/new') ?>">Baru</a>
                    <a href="#" onclick="history.go(-1)" class="btn btn-sm btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <?= !empty(esc($daftar_tiang[0]['jalan'])) ? 'Jln. ' . esc($daftar_tiang[0]['jalan']) : '' ?>
                        <?= !empty(esc($daftar_tiang[0]['kelurahan'])) ? ' ' . esc($daftar_tiang[0]['kelurahan']) : '' ?>
                        <?= !empty(esc($daftar_tiang[0]['kecamatan'])) ? ', ' . esc($daftar_tiang[0]['kecamatan']) : '' ?>
                        <?= !empty(esc($daftar_tiang[0]['kabupaten'])) ? ', ' . esc($daftar_tiang[0]['kabupaten']) : '' ?>
                        <?= !empty(esc($daftar_tiang[0]['provinsi'])) ? ', ' . esc($daftar_tiang[0]['provinsi']) : '' ?>
                    </div>
                    <img src="<?= base_url('uploads/tiang') . '/' . esc($daftar_tiang[0]['foto']) ?>" class="card-img-botton" alt="<?= esc($daftar_tiang[0]['foto']) ?>">
                </div>
            </div>
            <div class="col-6">
                <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>
            </div>
        </div>

        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE" />
    </form>


<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


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
            <?php if ($daftar_tiang !== []): ?>['<?= esc($daftar_tiang[0]['no_tiang']) ?>', <?= esc($daftar_tiang[0]['latitude']) ?>, <?= esc($daftar_tiang[0]['longitude']) ?>],

            <?php else: ?>
            <?php endif ?>

        ];

        var url = 'https://www.expedia.com/Flight-Search-Disambiguation?inpPackageType=FLIGHT_ONLY&inpInfants=2&origref=null&inpArrivalTimes=362&inpArrivalDates=02%2F10%2F2016&inpFlightClass=3&inpDepartureDates=01%2F30%2F2016&inpDepartureTimes=362&inpFlightRouteType=2&inpHotelRoomCount=1&inpFlightAirlinePreference=&inpAdultCounts=1&inpIsNonstopOnly=N&intcp=0&inpChildCounts=0&inpSeniorCounts=0&action=FlightSearchAll%40searchFlights&inpRefundableFlightsOnly=N&inpSortType=0&inpDepartureLocations=KTM&inpArrivalLocations=JFK&';

        for (i = 0; i < markers.length; i++) {
            var infoWindow = new google.maps.InfoWindow(),
                marker, i;
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            var image = "../assets/images/logokecil.png";
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0],
                icon: {
                    url: image,
                    labelOrigin: {
                        x: 20,
                        y: -10
                    },
                },
                label: {
                    text: markers[i][0],
                    color: 'white',
                    fontSize: '16px',
                },
            });

            var link = "<a href='" + url + "'' target='_blank' class='markerlink'>$" + markers[i][3] + "</a>";

            google.maps.event.addListener(marker, 'click', function() {
                window.open(url, '_blank');
            });

            infoWindow.setContent(link);
            // infoWindow.open(map, marker);
            map.fitBounds(bounds);
        }
    }
</script>