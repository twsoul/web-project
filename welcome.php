<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>


<?php
    include('login/dbcon.php'); //디비 연결
    include('login/check.php'); //세션 확인

    if (is_login()){
        ;
    }else
        header("Location: login/index.php");

	include('login/head.php');
?>

<div align="center">

<?php
	$user_id = $_SESSION['user_id'];

	try {
		$stmt = $con->prepare('select * from users where username=:username');
		$stmt->bindParam(':username', $user_id);
		$stmt->execute();

   } catch(PDOException $e) {
		die("Database error: " . $e->getMessage());
   }

   $row = $stmt->fetch();
// header("Location: http://localhost/enter.php");
   echo($row['regtime']);
?>

에 생성된

<?php echo $user_id; ?>로 로그인했습니다.

<!-- <form class="" action="enter.php" method="post">
  <input type="hidden" name="chage" value="">
</form> -->

<!-- <script type="text/javascript">
$.ajax({
     type : "GET",
     url : "test.jsp",
     dataType : "text",
     error : function() {
         alert('통신실패!!');
     },
     success : function(data) {
         $('#Context').html(data);
     }

 });

</script> -->

</div>

</body>
</html>
