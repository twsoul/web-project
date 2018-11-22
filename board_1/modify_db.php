<?php
include "db.php";

$bno = $_POST['uid'];
$sql = mq("update board set title='".$_POST['title']."',content='".$_POST['content']."' where uid='".$bno."'"); ?>
?>
<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/board_1/read.php?uid=<?php echo $bno; ?>">
