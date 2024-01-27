<?php
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
	$DBa = "";
	$DBi = "";
	$DBp = "";
	$DBn = "";
	// DBa=localhost=DB주소(아파치), DBi=DB계정아이디, DBp=DB계정비밀번호, DBn=DB이름
	$db = new mysqli($DBa,$DBi,$DBp,$DBn); 
	$db->set_charset("utf8");
	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>