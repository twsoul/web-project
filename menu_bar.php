<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css_style/menu_bar.css" />
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul class="ul">
      <li>
        <a href="/enter.php">홈</a>
      </li>

      <li >
        <a href="/explain_trea.php?stage=1단계
        &descript=웹+사이트에+접속합니다...&img=%2Fimg%2Fenter.jpg">보물 찾기 ?</a>
      </li>

   <!-- 메인 페이지! -->
      <li >
        <a href="/main_treasure.php">보물 찾으러 가자</a>
      </li>
   <!-- 게시판 페이지  -->
      <li >
        <a href="/afterword.php">후기</a>
      </li>

      <?php if (isset($_SESSION['$user_id']) && !empty($_SESSION['user_id'])){ ?>
        <li> <a href="login/index.php">로그인 됐음</a> </li>
      <?php } ?>
    
      <li>
       <a href="login/index.php">로그인</a>
      </li>


   </ul>

  </body>
</html>
