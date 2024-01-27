<?php
	include $_SERVER['DOCUMENT_ROOT']."/aproj/db.php";
?>
<!doctype html>
<head>
	<meta charset="UTF-8">
	<title>사진 게시판</title>
	<link rel="stylesheet" href="/aproj/css/style.css" />
</head>
<body>
	<?php
		$idxc = $_GET['idx'];
		$hit = mysqli_fetch_array(mq("select * from board where idx ='".$idxc."'"));
		$hit = $hit['hit'] + 1;
		$sql = mq("select * from board where idx='".$idxc."'");
		$board = $sql->fetch_array();
	?>
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
		<div style="text-align : center;">
			<?php // 사진 출력
				if ($board['pcnt'] != 0)
					for ($i=0;$i<$board['pcnt'];$i++)
					{
						echo " <img src='../upload/$board[name]/$i.jpg' />";
					}
			?>
		</div>
	<div id="bo_ser">
		<ul>
			<li><a href="/aproj/index.php">[목록으로]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
</body>
</html>