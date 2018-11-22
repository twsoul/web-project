<!-- 두번째 보물 -->

    <h1> 두번째 보물의 힌트</h1>

    <h2>첫번째 힌트 </h2>
    <div id="map" style="width:100%;height:500px;"></div>
    <h2>두번째 힌트 </h2>


    <script>
function myMap() {
  var amsterdam = new google.maps.LatLng(37.485396, 126.981188);

  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: amsterdam, zoom: 16};
  var map = new google.maps.Map(mapCanvas,mapOptions);

  var myCity = new google.maps.Circle({
    center: amsterdam,
    radius: 100,
    strokeColor: "#00004a",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#a6a6ed",
    fillOpacity: 0.4
  });
  myCity.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyCYkaRUhZgeXeMUGUfHj8NhqFkKCRbhpCw&callback=myMap"> </script>
