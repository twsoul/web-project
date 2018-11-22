<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;
    charset=UTF-8" />
<title>로그인</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/enter.php">보물찾기 홈으로</a>
			<ul class="nav navbar-nav">
            <!-- <li class="active"><a href="login/index.php">보물찾기?</a></li>
            <li class="active"><a href="http://localhost/main_treasure.php">보물을 찾으러 가자</a></li>
            <li class="active"><a href="login/index.php">후기</a></li> -->

            <!-- 세션아이디가 있다면 로그아웃이랑 인사말 보임 -->
            <?php if (isset($_SESSION['user_id'])) { ?>

<!-- 아이디를 세션으로 받아옴 -->
                <li><a href=""> <?php echo $_SESSION['user_id']; ?>님 안녕하세요</a></li>
                <li><a href="logout.php">로그 아웃</a></li>

            <?php } else { ?>

                <li><a href="login/index.php">Login</a></li>

             <?php } ?>
			</ul>
        </div>
    </div>
</nav>
