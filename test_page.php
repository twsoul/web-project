<?php
#
# paging.php
# 페이징 테스트 파일
#

$connect = mysqli_connect ( "127.0.0.1", "root", "akdlelql1013" ) or die ("DB에 연결할 수 없습니다.");
$status = mysqli_select_db("test_board", $connect) or die ("DB 사용 실패 : ".mysqli_error($connect));

// 페이지 설정
$page_set = 10; // 한페이지 줄수
$block_set = 5; // 한페이지 블럭수

$query = "SELECT count(no) as total FROM board";
$result = mysqli_query($query, $connect) or die ("쿼리 에러 : ".mysqli_error($connect));
$row = mysqli_fetch_array($result);

$total = $row[total]; // 전체글수

$total_page = ceil ($total / $page_set); // 총페이지수(올림함수)
$total_block = ceil ($total_page / $block_set); // 총블럭수(올림함수)

if (!$page) $page = 1; // 현재페이지(넘어온값)
$block = ceil ($page / $block_set); // 현재블럭(올림함수)

$limit_idx = ($page - 1) * $page_set; // limit시작위치

// 현재페이지 쿼리
$query = "SELECT no FROM board ORDER BY no DESC LIMIT $limit_idx, $page_set";
$result = mysqli_query($query, $connect) or die ("쿼리 에러 : ".mysqli_error($connect));
$rows = mysqli_num_rows($result);
// 리스트 뿌리기
echo "<pre>";
while ($row = mysqli_fetch_array($result)) {
echo $row[no]."\n";
}
echo "</pre>";

// 페이지번호 & 블럭 설정
$first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
$last_page = min ($total_page, $block * $block_set); // 마지막 페이지번호

$prev_page = $page - 1; // 이전페이지
$next_page = $page + 1; // 다음페이지

$prev_block = $block - 1; // 이전블럭
$next_block = $block + 1; // 다음블럭

// 이전블럭을 블럭의 마지막으로 하려면...
$prev_block_page = $prev_block * $block_set; // 이전블럭 페이지번호
// 이전블럭을 블럭의 첫페이지로 하려면...
//$prev_block_page = $prev_block * $block_set - ($block_set - 1);
$next_block_page = $next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호

// 페이징 화면
echo ($prev_page > 0) ? "<a href='$PHP_SELF?page=$prev_page'>[prev]</a> " : "[prev] ";
echo ($prev_block > 0) ? "<a href='$PHP_SELF?page=$prev_block_page'>...</a> " : "... ";

for ($i=$first_page; $i<=$last_page; $i++) {
echo ($i != $page) ? "<a href='$PHP_SELF?page=$i'>$i</a> " : "<b>$i</b> ";
}

echo ($next_block <= $total_block) ? "<a href='$PHP_SELF?page=$next_block_page'>...</a> " : "... ";
echo ($next_page <= $total_page) ? "<a href='$PHP_SELF?page=$next_page'>[next]</a>" : "[next]";

?>
