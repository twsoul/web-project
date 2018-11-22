<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("db_connect.php");

$host = '127.0.0.1';
$username = 'root';
$password = 'akdlelql1013';
$dbname = 'board';

$conn = mysqli_connect($host, $username, $password, $dbname);



$result = mysqli_query($conn,"SELECT*FROM test_bbs");

echo "<table border=1>";
while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" .$row["bbsNo"]. "</td>";
	echo "<td>" .$row['id']."</td>";
	echo "<td><a href='view.php?bbsno=" .$row['bbsNo']. "'>" .$row['content']. "</a></td>";
	echo "<td>".$row['regdate']."</td>";
	echo "</tr>";
}

?>
