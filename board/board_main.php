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
	    $stmt = $con->prepare('SELECT * FROM users ORDER BY username DESC'); //users 는 테이블 이
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
