<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>보물찾기 ?</title>
    <link rel="stylesheet" type="text/css" href="css_style/menu_bar.css"/>
    <link rel="stylesheet" type="text/css" href="css_style/explain.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- mysql 연결 -->
    <?php
ini_set('display_errors', '0');

    $host = '127.0.0.1';
    $username = 'root';
    $password = 'akdlelql1013';
    $dbname = 'explain_trea';

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (mysqli_connect_errno($conn))
    {
      echo "데이터베이스 연결 실패: " . mysqli_connect_error();
    }
    else
    {
      $sql ="SELECT title,descript,image FROM explain_con";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);

    // to do something
    }
     ?>
<style>

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

   	include('head.php'); ?>



<!-- 버튼을 눌렀을때 stage=1,2,3,4 단계 -->
<?php
// $sql1 ="SELECT title,descript,image FROM explain_con WHERE eid=1";
// $result1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch_array($result1);
//
// print_r($row1['title']);
 ?>

 <!-- 버튼 클릭시 동작 -->
<form id="1"  method="get">
  <input type="hidden" name="stage" value= "<?php
  $sql1 ="SELECT title,descript,image FROM explain_con WHERE eid=1";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);

  print_r($row1['title']);
   ?>" >
      <input type="hidden" name="descript" value="<?php print_r($row1['descript']) ?>">
      <input type="hidden" name="img" value="<?php print_r($row1['image']) ?>">

</form>


<form id="2"  method="get">
  <input type="hidden" name="stage" value="<?php
  $sql1 ="SELECT title,descript,image FROM explain_con WHERE eid=2";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);

  print_r($row1['title']);
   ?>">
   <!-- 설명 -->
   <input type="hidden" name="descript" value="<?php print_r($row1['descript']) ?>">
   <input type="hidden" name="img" value="<?php print_r($row1['image']) ?>">
</form>

<form id="3"  method="get">
  <input type="hidden" name="stage" value="<?php
  $sql1 ="SELECT title,descript,image FROM explain_con WHERE eid=3";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);

  print_r($row1['title']);
   ?>">
   <input type="hidden" name="descript" value="<?php print_r($row1['descript']) ?>">
   <input type="hidden" name="img" value="<?php print_r($row1['image']) ?>">

</form>

<form id="4"  method="get">
  <input type="hidden" name="stage" value="<?php
  $sql1 ="SELECT title,descript,image FROM explain_con WHERE eid=4";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);

  print_r($row1['title']);
   ?>">
   <input type="hidden" name="descript" value="<?php print_r($row1['descript']) ?>">
   <input type="hidden" name="img" value="<?php print_r($row1['image']) ?>">

</form>


<div class="tablinks" >
  <button class="tablink" onclick="document.getElementById('1').submit(); " >1 단계
  </button>

<!-- <button type ="submit"class="tablink" onclick="openCity('London', this, 'red')" id="defaultOpen">1 단계</button> -->
<button class="tablink" onclick="document.getElementById('2').submit();">2단계

</button>

<button class="tablink" onclick="document.getElementById('3').submit();">3단계</button>
<button class="tablink" onclick="document.getElementById('4').submit();">4 단계</button>

</div>

<script>
// function openCity(cityName,elmnt,color) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablink");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].style.backgroundColor = "";
//     }
//     document.getElementById(cityName).style.display = "block";
//     elmnt.style.backgroundColor = color;
//
// }
// Get the element with id="defaultOpen" and click on it
// 디폴트 클릭
// document.getElementById("defaultOpen").click();
</script>



    <!-- 글 설명 -->
    <div style= background-image:url("<?php echo $_GET['img'] ?>") ;>
      <section >
        <!-- <img src="/img/enter.jpg" alt=""> -->
        <script type="text/javascript">

        </script>

      <h1 style=""> <?php
      echo $_GET['stage'];     ?> </h1>

        <p><?php
        echo $_GET['descript'];
         ?></p>
      </section>

      <!-- <section class="item item-b">
        <h1>2 단계</h1>
        <p>미국 로키 산맥에 수백만 달러 상당의 보물을 숨겨 놓았다는 한 갑부 골동품상의 주장으로 시작된
          위험천만한 보물 찾기 모험이 수년째 이어지고 있다. 급기야 급류나 협곡에서 목숨을 잃는 인명 피해까지
          벌어져 ‘위험한 장난’이란 비판이 커지자, 보물을 숨긴 포레스트 펜(87)씨가 ‘사람들에 희망을 주기 위한
          일’이라고 반박하고 나섰다.</p>
      </section> -->
<!--
      <section class="item item-a">
        <h1>3 단계</h1>
        <p>미국 로키 산맥에 수백만 달러 상당의 보물을 숨겨 놓았다는 한 갑부 골동품상의 주장으로 시작된
          위험천만한 보물 찾기 모험이 수년째 이어지고 있다. 급기야 급류나 협곡에서 목숨을 잃는 인명 피해까지
          벌어져 ‘위험한 장난’이란 비판이 커지자, 보물을 숨긴 포레스트 펜(87)씨가 ‘사람들에 희망을 주기 위한
          일’이라고 반박하고 나섰다.</p>
      </section>

      <section class="item item-b">
        <h1>4 단계</h1>
        <p>미국 로키 산맥에 수백만 달러 상당의 보물을 숨겨 놓았다는 한 갑부 골동품상의 주장으로 시작된
          위험천만한 보물 찾기 모험이 수년째 이어지고 있다. 급기야 급류나 협곡에서 목숨을 잃는 인명 피해까지
          벌어져 ‘위험한 장난’이란 비판이 커지자, 보물을 숨긴 포레스트 펜(87)씨가 ‘사람들에 희망을 주기 위한
          일’이라고 반박하고 나섰다.</p>
      </section> -->

    </div>
  </body>
</html>
