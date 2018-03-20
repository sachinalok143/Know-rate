
<style>
    #frame{
        position: fixed;
        top: 5%;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 6px #B2B2B2;
        display: inline-block;
        padding: 8px 8px;
        width: 98%;
        height: 92%;
        display: none;
        z-index: 1000;
    }
    #map{
        position: fixed;
        display: inline-block;
        width: 99%;
        height: 93%;
        display: none;
        z-index: 1000;
    }

    #loading{
        position: fixed;
        top: 50%;
        left: 50%;
        opacity: 1!important;
        margin-top: -100px;
        margin-left: -150px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 6px #B2B2B2;
        display: inline-block;
        padding: 8px 8px;
        max-width: 66%;
        display: none;
        color: #000;

    }
    #mytitle{
        color: #FFF;
        background-image: linear-gradient(to bottom,#d67631,#d67631);
        //  border-color: rgba(47, 164, 35, 1);
        width: 100%;
        cursor: move;
    }
    #closex{ 
        display: block;
        float:right;
        position:relative;
        top:-10px;
        right: -10px;
        height: 20px;
        cursor: pointer;
    }
    .pointer{
        cursor: pointer !important;
    }

</style> 
<div id="loading">
    <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
    Loading...
</div>
<div id="frame">
    <div id="headerx"></div>
    <div id="map" >    
    </div>
</div>


<?php
$url = Yii::app()->baseUrl . '/reports/reports/transponderdetails';
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<script>
    function clode() {
        $('#frame').hide();
        $('#frame').html();
    }
    function track(id) {
        $('#loading').show();
        $('#loading').parent().css("opacity", '0.7');


        $.ajax({
            type: "POST",
            url: '<?php echo $url; ?>',
            data: {'id': id},
            success: function(data) {
                $('#frame').show();
                $('#headerx').html(data);
                $('#loading').parents().css("opacity", '1');
                $('#loading').hide();
                var thelat = parseFloat($('#lat').text());
                var long = parseFloat($('#long').text());
                $('#map').show();
                var lat = thelat;
                var lng = long;
                var orlat=thelat;
                var orlong=long;
                //Intialize the Path Array
                var path = new google.maps.MVCArray();
                var service = new google.maps.DirectionsService();


                var myLatLng = new google.maps.LatLng(lat, lng), myOptions = {zoom: 4, center: myLatLng, mapTypeId: google.maps.MapTypeId.ROADMAP};
                var map = new google.maps.Map(document.getElementById('map'), myOptions);
                var poly = new google.maps.Polyline({map: map, strokeColor: '#4986E7'});
                var marker = new google.maps.Marker({position: myLatLng, map: map});

                function initialize() {
                    marker.setMap(map);
                    movepointer(map, marker);
                    var drawingManager = new google.maps.drawing.DrawingManager();
                    drawingManager.setMap(map);
                }

                function movepointer(map, marker) {
                    marker.setPosition(new google.maps.LatLng(lat, lng));
                    map.panTo(new google.maps.LatLng(lat, lng));

                    var src = myLatLng;//start point
                    var des = myLatLng;// should be the destination
                    path.push(src);
                    poly.setPath(path);
                    service.route({
                        origin: src,
                        destination: des,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    }, function(result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                path.push(result.routes[0].overview_path[i]);
                            }
                        }
                    });

                }
                ;

                // function()
                setInterval(function() {
                    lat = Math.random() + orlat;
                    lng = Math.random() + orlong;
                    console.log(lat + "-" + lng);
                    myLatLng = new google.maps.LatLng(lat, lng);
                    movepointer(map, marker);

                }, 1000);



            },
            error: function() {
                $('#frame').html('Sorry, no details found');
            },
        });
        return false;
    }
    $(function() {
        $("#frame").draggable();
    });

</script>