<?php
	include "db.php";

	$bno = $_GET['uid'];
	$sql = mq("delete from board where uid='$bno';");
?>
<script type="text/javascript">alert("게시물이 삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/board_1/index.php" />
