<?php

	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
	$a = "";
	$b = "";
	$c = "";
	$d = "";
	// a=localhost=DB주소(아파치), b=DB계정아이디, c=DB계정비밀번호, d="DB이름"
	$db = new mysqli($a,$b,$c,$d); 
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>