<?php
// 메뉴
    include('../login/dbcon.php'); //디비 연결
    include('../login/check.php'); //세션 확인

    // if (is_login()){ //로그인이 되있으면
    //   include('head.php')  ;
    //
    // }
include "db.php";
$date = date('Y-m-d H:i:s');

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "../upload/".$filename;
move_uploaded_file($tmpfile,$folder);


// for($i=0;$i<50;$i++){
// if($_SESSION['user_id'] == 'admin'){
//   $sql = mq("insert into board(name,title,content,date,img_file) values
//   ('1','".$_POST['title']."','".$_POST['content']."','".$date."','".$o_name."')");
//
// }

$sql = mq("insert into board(name,title,content,date,img_file) values
('".$_SESSION['user_id']."','".$_POST['title']."','".$_POST['content']."','".$date."','".$o_name."')");

// }
?>
<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/board_1/index.php" />
