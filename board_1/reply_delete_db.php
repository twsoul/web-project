<?php
include "db.php";

$rno = $_POST['rno'];
$sql = mq("select * from reply where uid='".$rno."'");
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from board where uid='".$bno."'");
$board = $sql2->fetch_array();


	$sql = mq("delete from reply where uid='".$rno."'");?>
	<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("read.php?uid=<?php echo $board["uid"]; ?>");</script>
