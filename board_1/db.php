<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$db = new mysqli("127.0.0.1","root","akdlelql1013","board");
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
 ?>
