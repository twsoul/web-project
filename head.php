<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
    charset=UTF-8" />
<title>로그인 예제</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<?php ini_set('display_errors', '0');
 ?>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/enter.php">보물찾기 홈</a>
			<ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/explain_trea.php?stage=1%EB%8B%A8%EA%B3%84&descript=%EC%9B%B9+%EC%82%AC%EC%9D%B4%ED%8A%B8%EC%97%90+%EC%A0%91%EC%86%8D%ED%95%A9%EB%8B%88%EB%8B%A4...&img=%2Fimg%2Fenter.jpg">보물찾기?</a></li>
            <li class="active"><a href="http://localhost/main_treasure.php">보물을 찾으러 가자</a></li>
            <li class="active"><a href="http://localhost/board_1/index.php">후기 게시판</a></li><!-- 세션아이디가 있다면 로그아웃이랑 인사말 보임 -->

            <!-- 프로필 보여주기 -->
            <!-- <li class="active"><a href="login/index.php"></a></li>-->
            <?php if (isset($_SESSION['user_id'])) { ?>

<!-- 아이디를 세션으로 받아옴 -->
                <li><a href=""> <?php echo $_SESSION['user_id']; ?>님 안녕하세요</a></li>
                <li><a href="login/logout.php">로그 아웃</a></li>

            <?php } else { ?>

                <li><a href="login/index.php">Login</a></li>

             <?php } ?>
			</ul>
        </div>
    </div>
</nav>
