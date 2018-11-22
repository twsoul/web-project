<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div id="board_write">
      <?php
      include('../login/dbcon.php'); //디비 연결
      include('../login/check.php'); //세션 확인
      if($_SESSION['user_id'] == 'admin'){ ?>
        <h1><a href="/">공지사항</a></h1>
      <?php }else {?>
        <h1><a href="/">후기 남기기</a></h1>
        <h4>글을 작성해주세요.</h4>
      <?php } ?>

            <div id="write_area">
                <form action="write_db.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_file">
                       <input type="file" value="1" name="b_file" />
                   </div>
                    <div class="bt_se">
                        <button type="submit">저장</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
