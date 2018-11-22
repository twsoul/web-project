<?php

    include('dbcon.php');
    include('check.php');

    // if (is_login()){

        unset($_SESSION['user_id']);
        session_destroy();
    // }

    header("Location: http://localhost/enter.php");
?>
<script type="text/javascript">
alert("로그 아웃 되었습니다.")
</script>
