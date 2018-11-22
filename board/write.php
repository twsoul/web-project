<?php
$id = $_POST['id'];
$content = $_POST['content'];

include("db_connect.php");

$host = '127.0.0.1';
$username = 'root';
$password = 'akdlelql1013';
$dbname = 'board';

$conn = mysqli_connect($host, $username, $password, $dbname);
//

$query = "'INSERT INTO test_bbs (id, content) values('$id','$content')";

$db_inet = mysqli_query($conn, $query);

// $db_inet->mysqli_query($query);

$bbsid = mysqli_insert_id($conn);

//$path = $_SERVER['DOCUMENT_ROOT'].'/testBBS/';
$path = "board/upload_img/";
echo $path;
echo $bbsid;
$filename = date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);

$query1 = "INSERT INTO test_image (bbsNo, path, filename) values ($bbsid, '$path', '$filename')";

$db_inet = mysqli_query($conn, $query1);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>게시물 작성 예제 폼</title>
</head>
<body>
<table>
<tr>

	<td>전송아이디:</td>
	<td><?=$id;?></td>
</tr>
<tr>
	<td>전송내용:</td>
	<td><?=$content;?></td>
</tr>
<tr>
	<td>전송이미지</td>
	<td><img src="<?php echo $filename;?>" /></td>
	<!-- <td><img src="20181020110307.jpg" /></td> -->
	<?php echo $filename; ?>
</tr>
</table>
<p><b>전송완료</b></p>
<p><a href='list.php'>목록가기</a></p>
</body>
</html>
