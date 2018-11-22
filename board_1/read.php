<?php
	include "db.php"; /* db load */

  include('../login/dbcon.php'); //디비 연결
  include('../login/check.php'); //세션 확인
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"> </script>
<script type="text/javascript" src="common.js"></script>

</head>
<body>
	<?php
		$bno = $_GET['uid']; /* bno함수에 idx값을 받아와 넣음*/

		$hit = mysqli_fetch_array(mq("select * from board where uid ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = mq("update board set hit = '".$hit."' where uid = '".$bno."'");
		$sql = mq("select * from board where uid='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="index.php">[목록으로]</a></li>
<!-- 세션과 글쓴이(name) 비교 해서 보여주기 -->
      <?php if($_SESSION['user_id']==$board['name']||$_SESSION['user_id'] == 'admin'){ ?>
			<li><a href="modify.php?uid=<?php echo $board['uid']; ?>">[수정]</a></li>
			<li><a href="delete.php?uid=<?php echo $board['uid']; ?>">[삭제]</a></li>
    <?php } ?>
		</ul>
	</div>

  <div>
    <img style="margin-top:30px"src="../upload/<?php echo $board['img_file'];?>" alt="[이미지 없음]">
  </div>

  <!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
		// 게시판 번호로 불러옴
			$sql3 = mq("select * from reply where con_num='".$bno."' order by uid desc");
			while($reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">

				<?php if($_SESSION['user_id']==$reply['name']){ ?>
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			<?php } ?>
				<a class="re_reply_bt" href="#">답글</a>
			</div>


			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="reply_modify_db.php">
					<input type="hidden" name="rno" value="<?php echo $reply['uid']; ?>" />
					<input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<!-- <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" /> -->
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제  확인 -->
			<div class='dat_delete'>
				<form action="reply_delete_db.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['uid']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>삭제 하시겠습니까? <input type="submit" value="확인"></p>
				 </form>
			</div>
			<!-- 대댓글 작성 폼 다이얼로그 -->
			<div class="re_reply">
				<form method="post" >
          <input type="hidden" name="re_no" value="<?php echo $reply['uid']; ?>" />
          <input type="hidden" name="o_name" value="<?php echo $reply['name'] ?>">
          <textarea name="re_content" class="dap_edit_t" placeholder="답글 입력란"></textarea>
          <button  class="re_re_bt">답글남기기</button>
        </form>
			</div>

		</div>
		<!-- 대댓글 불러오는 반복문 -->
		<h5>대댓글 목록</h5>
		<?php
		// 댓글의 uid 번호로 불러옴
			$sql4 = mq("select * from re_reply where con_num='".$reply['uid']."' order by uid desc");
			while($re_reply = $sql4->fetch_array()){
		?>

		<div class="dap_lo_re">
			<div><b><?php echo $re_reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo "<span style='color:rgb(165, 0, 254)'>".$re_reply['o_name']."</span>"." "; ?><?php echo nl2br("$re_reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $re_reply['date']; ?></div>
			<div class="rep_me rep_menu">

				<?php if($_SESSION['user_id']==$re_reply['name']||$_SESSION['user_id'] == 'admin'){ ?>
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			<?php } ?>
				<a class="re_reply_bt" href="#">답글</a>
			</div>

			<!-- 대댓글 작성 폼 다이얼로그 -->
			<div class="re_reply">
				<form method="post" >
					<input type="hidden" name="re_no" value="<?php echo $reply['uid']; ?>" />
					<input type="hidden" name="o_name" value="<?php echo $reply['name'] ?>">
					<textarea name="re_content" class="dap_edit_t" placeholder="답글 입력란"></textarea>
					<button  class="re_re_bt">답글남기기</button>
				</form>
			</div>


		</div>
<?php } ?>

	<?php } ?>



	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form method="post" class="reply_form">
			<input type="hidden" name="bno" value="<?php echo $bno; ?>">
			<!-- <input type="text" name="dat_user" id="dat_user" size="15" placeholder="아이디">
			<input type="password" name="dat_pw" id="dat_pw" size="15" placeholder="비밀번호"> -->
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" placeholder="댓글..남기세요"></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>

</div>
</body>
</html>
