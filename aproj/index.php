<?php 
  include  $_SERVER['DOCUMENT_ROOT']."/aproj/db.php"; 
?>
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" href="/aproj/css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          $sql = mq("select * from board order by idx desc limit 0,5"); 
            while($board = $sql->fetch_array())
            {
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><a href="/aproj/page/read.php?idx=<?php echo $board["idx"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="/aproj/page/write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>