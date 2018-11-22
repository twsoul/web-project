

  <!DOCTYPE html>
  <html>
    <head>
      <title>보물 찾기</title>

      <link rel="stylesheet" type="text/css" href="css_style/menu_bar.css" />
      <link rel="stylesheet" type="text/css" href="css_style/style.css" />
      <script type="text/javascript" src="js_folder/packed.js"></script>
      <script type="text/javascript" src="js_folder/pop.js"></script>
      <!-- 배경 이미지 스타일 -->

      <style>

      img.alpha_ex{
        opacity: 0.7;
      }
      .test {
        background-image: url('enter.jpg');

        opacity: 0.6;  /*투명도 조절 */
      }

      </style>

    </head>

    <body>
      <!-- <script type="text/javascript">
      function doPopupopen() {
         window.open("1.php", "popup01", 'width=600, height=1000, scrollbars= 0, toolbar=0, menubar=no');
      }
      </script> -->

      <!-- 팝업1  갑자기 쳐 안됨-->
      <!-- <script type="text/javascript">
      function getCookie( name ){
       var nameOfCookie = name + "=";
       var x = 0;
       while ( x <= document.cookie.length ){
        var y = (x+nameOfCookie.length);
        if ( document.cookie.substring( x, y ) == nameOfCookie ) {
         if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
         endOfCookie = document.cookie.length;
         return unescape( document.cookie.substring( y, endOfCookie ) );
        }
        x = document.cookie.indexOf( " ", x ) + 1;
        if ( x == 0 ) break;
       }
       return "";
      }

      if ( getCookie("popup") !="done" ) {
       var noticePopup = window.open('popup.php','notice','left=0, top=0, width=350,height=300');
       noticePopup.opener = self;
      }

      </script> -->
      <!--  -->
      <script>

      if(!checkPoupCookie("closepop")){

      window.open('popup0.php','notice','left=0, top=0, width=350,height=300');

      }


      function checkPoupCookie(cookieName){

      var cookie = document.cookie;

      // 현재 쿠키가 존재할 경우

      if(cookie.length > 0){

      // 자식창에서 set해준 쿠키명이 존재하는지 검색

      startIndex = cookie.indexOf(cookieName);

      // 존재한다면

      if(startIndex != -1){

      return true;

      }else{

      // 쿠키 내에 해당 쿠키가 존재하지 않을 경우

      return false;

      };

      }else{

      // 쿠키 자체가 없을 경우

      return false;

      };

    }
      </script>

      <!--  -->

<!-- 로그인부분 -->

<?php


    include('login/dbcon.php'); //디비 연결
    include('login/check.php'); //세션 확인


    if (is_login()){ //로그인이 되있으면
      include('head.php')  ;
    }else
        // header("Location: login/index.php");

	include('head.php');
?>

<div align="center">

<!-- 아이디 세션 확인후 처리 -->
<?php
	$user_id = $_SESSION['user_id'];
  // echo session_cache_expire();//세션 로그인 기본3시간..

	try {
		$stmt = $con->prepare('select * from users where username=:username');
		$stmt->bindParam(':username', $user_id);
		$stmt->execute();

   } catch(PDOException $e) {
		die("Database error: " . $e->getMessage());
   }

   $row = $stmt->fetch();
// header("Location: http://localhost/enter.php");
   // echo($row['regtime']);
?>



<!-- <?php //echo $user_id; ?>님 안녕하세요 -->

<!--ㅡㅡㅡㅡㅡㅡㅡㅡ  -->
<!-- 본문 내용 -->
     <!-- 메뉴 -->
     <?php //include('menu_bar.php'); ?>

    <!-- 로그인 창..? 버튼? -->
    <div style="padding:5px">
      <!-- <input type="text" name="ID" value="" placeholder="아이디">
      <input type="password" name="PW" value="" placeholder="비밀번호">
      <button type="button" name="login" >로그인</button>
      <button type="button" name="membership">회원가입</button> -->

     </div>


<h1> 보물을 찾으러 떠나세요</h1>
<!-- 전체 이미지 부분 -->
<div id="wrapper">
	<div>
		<!-- <div class="sliderbutton"><img src="/data/201010/IJ12875323685154/left.gif" width="32" height="38" alt="Previous" onclick="slideshow.move(-1)" /></div> -->
		<div id="slider">
			<ul>

				<li><img src="/img/enter.jpg" width="1000px" height="500px" alt="1단계" /></li>
        <li><img src="/img/img_1.jpg" width="1000px" height="500px" alt="2단계" /></li>
        <li><img src="/img/img_2.jpg" width="1000px" height="500px" alt="3단계" /></li>
        <li><img src="/img/img_3.png" width="1000px" height="500px" alt="4단계" /></li>


			</ul>
		</div>
		<!-- <div class="sliderbutton"><img src="/data/201010/IJ12875323685154/right.gif" width="32" height="38" alt="Next" onclick="slideshow.move(1)" /></div> -->
	</div>
	<ul id="pagination" class="pagination">
    <!-- packed.js 에서포지션을 바꿔줌 -->
		<li onclick="slideshow.pos(0)">1</li>
		<li onclick="slideshow.pos(1)">2</li>
		<li onclick="slideshow.pos(2)">3</li>
		<li onclick="slideshow.pos(3)">4</li>
	</ul>
</div>
<script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:3,
	resume:true,
	vertical:false,
	navid:'pagination',
	activeclass:'current',
	position:0
});
</script>

</div>




    </body>
  </html>
