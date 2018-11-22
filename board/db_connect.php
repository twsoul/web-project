<?php

$host = '127.0.0.1';
$username = 'root';
$password = 'akdlelql1013';
$dbname = 'board';

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno($conn))
{
  echo "데이터베이스 연결 실패: " . mysqli_connect_error();
}

?>
