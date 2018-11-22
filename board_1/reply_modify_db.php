<?php
include "db.php";

$rno = $_POST['rno'];
$sql = mq("select * from reply where uid='".$rno."'");
$reply = $sql->fetch_array();

$bno = $_POST['b_no'];
$sql2 = mq("select * from board where uid='".$bno."'");
$board = $sql2->fetch_array();

$sql3 = mq("update reply set content='".$_POST['content']."' where uid = '".$rno."'"); ?>
<script type="text/javascript">alert('수정되었습니다.'); location.replace("read.php?uid=<?php echo $bno; ?>");</script>
?>
