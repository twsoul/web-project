<?php
include 'dbcon.php';
$LIST_SIZE = 6;
$MORE_PAGE = 3;

$page = $_GET['page'] ? intval($_GET['page']) : 1;
$page_count = query_one("SELECT CEIL( COUNT(*)/$LIST_SIZE ) FROM users");

$start_page = max($page - $MORE_PAGE, 1);
$end_page = min($page + $MORE_PAGE, $page_count);
$prev_page = max($start_page - $MORE_PAGE - 1, 1);
$next_page = min($end_page + $MORE_PAGE + 1, $page_count);

$offset = ( $page - 1 ) * $LIST_SIZE;
$rows = query_rows("SELECT * FROM board1 ORDER BY id DESC LIMIT $offset, $LIST_SIZE");
?>
<style>
a { text-decoration: none; }
.pagenum {
	display: inline-block; width: 25px;
	border: 1px solid transparent;
	color: gray; font-weight: bold;
	text-decoration: none; text-align: center;
}
.pagenum:hover { color: orange; border: 1px solid orange; }
.pagenum.current { color: orange; text-decoration: underline; }
.move_btn { color: gray; }
.disabled { color: silver; }
.paging_area { text-align: center; }
</style>

<table>
	<tr>
		<th>번호</th>
		<th>제목</th>
	</tr>
	<?php foreach( $rows as $row ): ?>
	<tr>
		<td><?= $row['id'] ?></td>
		<td><?= $row['subject'] ?></td>
	</tr>
	<?php endforeach ?>
</table>

<div class='paging_area'>
	<?php if( $start_page > 1 ): ?>
	<a class='move_btn' href="<?= "$PHP_SELP?page=$prev_page" ?>">« 이전</a>
	<a class='pagenum' href="<?= "$PHP_SELP?page=1" ?>">1</a> ...
	<?php else: ?>
	<span class='move_btn disabled'>« 이전</span>
	<?php endif ?>

	<?php for( $p = $start_page; $p <= $end_page; $p++ ): ?>
	<a class='pagenum <?= ( $p == $page )?"current":"" ?>' href="<?= "$PHP_SELP?page=$p" ?>">
		<?= $p ?>
	</a>
	<?php endfor ?>

	<?php if( $end_page < $page_count ): ?>
	... <a class='pagenum' href="<?= "$PHP_SELP?page=$page_count" ?>"><?= $page_count ?></a>
	<a class='move_btn' href="<?= "$PHP_SELP?page=$next_page" ?>">다음 »</a>
	<?php else: ?>
	<span class='move_btn disabled'>다음 »</span>
	<?php endif ?>
</div>
