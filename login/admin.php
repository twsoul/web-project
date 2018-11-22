<!-- 관리자 로그인 -->

<?php
    include('dbcon.php');
    include('check.php');

    if (is_login()){
      //관리자 로그인
        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1)
            ;
        else
        //메인 페이지
            header("Location: http://localhost/enter.php");
    }else
    // 로그인 있는 곳
        header("Location: index.php");

    include('head.php');
?>


<head>
  <style media="screen">
  /* 페이징 */
  #page_num {
    font-size: 14px;
    margin-left: 260px;
    margin-top:30px;
  }
  #page_num ul li {
    float: left;
    margin-left: 10px;
    text-align: center;
  }
  .fo_re {
    font-weight: bold;
    color:red;
  }
  </style>
</head>
<!-- 관리자 화면 -->
<div class="container">
	<div class="page-header">
    	<h1 class="h2">&nbsp; 사용자 목록</h1><hr>
    </div>
<div class="row">

    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>
        <tr>
            <th>아이디</th>
            <th>각오</th>
            <th>계정 활성화</th>
            <th>수정</th>
            <th>삭제</th>
        </tr>
        </thead>

        <?php
        //페이징
        if(isset($_GET['page'])){
                      $page = $_GET['page'];
                        }else{
                          $page = 1;
                        }

          $res = $con->prepare('SELECT * FROM users');
          $res->execute();

          $row_num = $res->rowCount(); //게시판 총 레코드 수

          $list = 5; //한 페이지에 보여줄 개수
          $block_ct = 5; //블록당 보여줄 페이지 개수

          $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기

          $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
          $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

        $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
        if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
        $total_block = ceil($total_page/$block_ct); //블럭 총 개수

        $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

        //mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm
	    $stmt = $con->prepare('SELECT * FROM users ORDER BY username'); //users 는 테이블 이
	    $stmt->execute();

            if ($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	        {
		    extract($row);

		if ($username != 'admin'){
		?>
			<tr>
			<td><?php echo $username;  ?></td>
			<td><?php echo $userprofile; ?></td>
			<td>
			<?php
			if($activate)
			{
				echo "활성";
			} else{
			    echo "비활성";
			}
			?>
			</td>
      <!-- 계정 수정하기 -->
      <!-- get으로 edit_id 주소 값으로 보내기 -->
      <!-- 각각 editform.php // delete.php로 보냄. -->
			<td><a class="btn btn-primary" href="editform.php?edit_id=<?php echo $username ?>">
        <span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
      <!-- 계정 삭제 하기 -->
			<td><a class="btn btn-warning" href="delete.php?del_id=<?php echo $username ?>" onclick="return confirm('<?php echo $username ?> 사용자를 삭제할까요?')">
			<span class="glyphicon glyphicon-remove"></span>Del</a></td>
			</tr>

        <?php
			}
                }
             }
        ?>
        </table>
</div>

<!-- 페이징 -->
<!-- <div id="page_num">
     <ul>
       <?php
         if($page <= 1)
         { //만약 page가 1보다 크거나 같다면
           echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시
         }else{
           echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
         }
         if($page <= 1)
         { //만약 page가 1보다 크거나 같다면 빈값

         }else{
         $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
           echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
         }
         for($i=$block_start; $i<=$block_end; $i++){
           //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
           if($page == $i){ //만약 page가 $i와 같다면
             echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
           }else{
             echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
           }
         }
         if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
         }else{
           $next = $page + 1; //next변수에 page + 1을 해준다.
           echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
         }
         if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
           echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
         }else{
           echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
         }
       ?>
     </ul>
   </div> -->
    <!--페이징  -->

</body>
</html>
