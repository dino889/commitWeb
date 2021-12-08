<?php
	session_start();
	// header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$db = new mysqli("localhost", "howon", "P@ssw0rd", "CommIT_web_final");
	$db->set_charset("utf8");   //DB 문자열 utf-8 인코딩

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>
