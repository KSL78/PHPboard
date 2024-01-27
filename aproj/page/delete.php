<?php
	include $_SERVER['DOCUMENT_ROOT']."/aproj/db.php";
	
	$idxc = $_GET['idx'];
	$sql = mq("delete from board where idx='$idxc';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/aproj/index.php" />