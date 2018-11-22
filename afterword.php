<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>후기 게시판</title>
    <link rel="stylesheet" type="text/css" href="css_style/menu_bar.css"/>

    <script type="text/javascript" src="js_folder/map.js"></script>
  </head>
  <body>
    <!-- 메뉴 -->
    <?php

        include('login/dbcon.php'); //디비 연결
        include('login/check.php'); //세션 확인


        if (is_login()){ //로그인이 되있으면
          include('head.php')  ;

        }else{
        ?>
        <script>
        alert("로그인이 필요한 페이지 입니다.")
        window.location = "http://localhost/enter.php"</script>
      <?php }  ?>
<?php echo $_SESSION['user_id'] ?>

  </body>
</html>


<div class="container">
	<div class="page-header">
    	<h1 class="h2">&nbsp; 사용자 목록</h1><hr>
    </div>
<div class="row">

    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>
        <tr>
            <th>아이디</th>
            <th>제목</th>
            <th>내용</th>
            </tr>
        </thead>


			</td>

        </table>
</div>
