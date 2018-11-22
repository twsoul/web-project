<!-- 기본 로그인 화면 -->
<?php
    include('dbcon.php'); //디비 연결
    include('check.php');

    if(is_login()){
        // 관리자 권한 세션이 있으면 admin.php 로 가라
        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1)
            header("Location: admin.php");
        else
            header("Location: http://localhost/welcome.php");
    }

    include('head.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>보물찾기 로그인</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap1.min.css">
</head>


<body>

<div class="container">

	<h2 align="center">로그인</h2><hr>

	<form class="form-horizontal" method="POST">
		<div class="form-group" style="padding: 10px 10px 10px 10px;">
			<label for="user_name">아이디:</label>
			<input type="text" name="user_name"  class="form-control" id="inputID" placeholder="아이디를 입력하세요."
				required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
		</div>
		<div class="form-group" style="padding: 10px 10px 10px 10px;">
			<label for="user_password">패스워드:</label>
			<input type="password" name="user_password" class="form-control" id="inputPassword" placeholder="패스워드를 입력하세요."
				required  autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> 아이디 기억</label>
		</div>
		</br>
		<div class="from-group" style="padding: 10px 10px 10px 10px;" >
			<button type="submit" name="login" class="btn btn-success" >로그인</button>
			<a class="btn btn-success" href="registration.php" style="margin-left: 30px">
			<span class="glyphicon glyphicon-user"></span>&nbsp;회원가입
			</a>

      </a>
		</div>

  </br>
	</form>
</div>
</body>
</html>


<?php

    $login_ok = false;

    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['login']) )
    {
      // 입력한 아이디랑 비밀번호를 post로 받아서 처리
		$username=$_POST['user_name'];
		$userpassowrd=$_POST['user_password'];

		if(empty($username)){
			$errMSG = "아이디를 입력하세요.";
		}else if(empty($userpassowrd)){
			$errMSG = "패스워드를 입력하세요.";
		}else{


			try {

				$stmt = $con->prepare('select * from users where username=:username');

				$stmt->bindParam(':username', $username);
				$stmt->execute();

			} catch(PDOException $e) {
				die("Database error. " . $e->getMessage());
			}

			$row = $stmt->fetch();
			$salt = $row['salt'];
			$password = $row['password'];

			$decrypted_password = decrypt(base64_decode($password), $salt);

			if ( $userpassowrd == $decrypted_password) {
				$login_ok = true;
			}
		}

//에러 메세지
		if(isset($errMSG))
			echo "<script>alert('$errMSG')</script>";


        if ($login_ok){

// 계정 활성화 부분
        //     if ($row['activate']==0)
				// echo "<script>alert('$username 계정 활성이 안되었습니다. 관리자에게 문의하세요.')</script>";
        //     else{


					session_regenerate_id();
					$_SESSION['user_id'] = $username;
					$_SESSION['is_admin'] = $row['is_admin'];

					if ($username=='admin' && $row['is_admin']==1 )
						header('location:admin.php');
					else
						header('location: http://localhost/enter.php');
					session_write_close();
			// }
		}
		else{
			echo "<script>alert('$username 인증 오류')</script>";
		}
	}
?>