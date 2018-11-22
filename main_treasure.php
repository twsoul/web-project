<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> 보물을 찾으러 가자</title>
    <link rel="stylesheet" type="text/css" href="css_style/menu_bar.css"/>
    <!-- <script type="text/javascript" src="js_folder/map.js"></script> -->

<style media="screen">
.menu{
  margin-left: 40px;
}

button {

    width:100px;

    background-color: hsl(0, 0%, 11%);
    border: none;
    padding: 15px 0;

}

</style>



  </head>
  <body>
    <!-- 메뉴 -->
    <?php

        include('login/dbcon.php'); //디비 연결
        include('login/check.php'); //세션 확인

        if (is_login()){ //로그인이 되있으면
          include('head.php')  ;
        }else
            // header("Location: login/index.php");

    	include('head.php');
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $("#b1").click(function(){
            $.ajax({
              url: "1.php",
              result:$("id_form").serialize(),
              success: function(result){
                $("#id_form").html(result);
            }});
        });
        $("#b2").click(function(){
            $.ajax({
              url: "2.php",
              result:$("id_form").serialize(),
              success: function(result){
                $("#id_form").html(result);
            }});
        });
        $("#b3").click(function(){
            $.ajax({
              url: "3.php",
              result:$("id_form").serialize(),
              success: function(result){
                $("#id_form").html(result);
            }});
        });

        });

    </script>

<div class="">
  <button id="b1">첫번째 보물</button>
  <button id="b2">두번째 보물</button>
  <button id="b3">세번째 보물</button>
</div>



    <!-- 메인컨텐츠 -->

      <!-- <form>
        <div class="">
          보물을 선택하세요
        </div>
  <select name="users" onchange="showUser(this.value)" style="Color:rgb(37, 38, 37)">
    <option value="">보물</option>
    <option value="1">첫번째 보물</option>
    <option value="2">두번째 보물</option>
    <option value="3">세번째 보물</option>
    </select>
  </form> -->

  <?php
     // if( empty($_GET['treasure']) == false ) {
     //   echo file_get_contents($_GET['treasure'].".txt");
     // }else {?>
       <span id="id_form"><h1>보물을 찾아라! 주인공은 바로 당신!</h1></span>

   <?php ?>



<!-- 첫번째 보물 -->
    <!-- <h1>첫번째 힌트 </h1>
    <div id="map" style="width:100%;height:500px;"></div>
    <h1>두번째 힌트 -</h1> -->


    <!-- <script>
function myMap() {
  var amsterdam = new google.maps.LatLng(37.481613, 126.974535);

  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: amsterdam, zoom: 16};
  var map = new google.maps.Map(mapCanvas,mapOptions);

  var myCity = new google.maps.Circle({
    center: amsterdam,
    radius: 300,
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
AIzaSyCYkaRUhZgeXeMUGUfHj8NhqFkKCRbhpCw&callback=myMap"> </script> -->


  </body>
</html>
