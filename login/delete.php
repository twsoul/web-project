
<!-- 계정 삭제 -->

<?php

    include('dbcon.php');
    include('check.php');

    if (is_login()){

        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1)
            ;
        else
            header("Location:http://localhost/enter.php");
    }else
        header("Location: index.php");


    if(isset($_GET['del_id'])) //id 삭제 하는 곳 보기
    {
	$stmt = $con->prepare('DELETE FROM users WHERE username =:del_id');
	$stmt->bindParam(':del_id',$_GET['del_id']);
	$stmt->execute();
    }

    header("Location: admin.php");
?>
