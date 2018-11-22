<?php

  include('../login/dbcon.php'); //디비 연결
  include('../login/check.php'); //세션 확인

	include "db.php";

	$bno = $_POST['bno'];
  $date = date('Y-m-d H:m:s');
	// $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
	$sql = mq("insert into reply (con_num,name,content,date) values('".$bno."','".$_SESSION['user_id']."','".$_POST['content']."','".$date."')");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"> </script>
<script type="text/javascript" src="common.js"></script>

	<h3>댓글목록</h3>
		<?php
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
			<div class="dat_edit" >
				<form method="post" action="reply_modify_db.php">
					<input type="hidden" name="rno" value="<?php echo $reply['uid']; ?>" />
          <input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<!-- <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" /> -->
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete_db.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['uid']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		 <input type="submit" value="확인"></p>
				 </form>
			</div>

      <!-- 대댓글 작성 폼 -->
      <div class="re_reply">
        <form method="post"  >
          <input type="hidden" name="re_no" value="<?php echo $reply['uid']; ?>" />
          <input type="hidden" name="o_name" value="<?php echo $reply['name'] ?>">
          <textarea name="re_content" class="dap_edit_t" placeholder="답글 입력란"><?php echo $reply['uid']; echo $reply['name']; ?></textarea>
          <button  class="re_re_bt">답글</button>
        </form>
      </div>

		</div>
<!-- 대댓글 불러오는 반복문 -->
<h5>대댓글 목록</h5>

	<?php } //댓글 불러오는 반복문 끝나는 부분?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form method="post" class="reply_form">
			<input type="hidden" name="bno" value="<?php echo $bno; ?>">
			<!-- <input type="text" name="dat_user" id="dat_user" size="15" placeholder="아이디">
			<input type="password" name="dat_pw" id="dat_pw" size="15" placeholder="비밀번호"> -->
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
