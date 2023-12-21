<?php

include $_SERVER['DOCUMENT_ROOT']."/aproj/db.php";
$date = date('Y-m-d');
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
if(isset($_POST['lockpost'])){
	$lo_post = '1';
}else{
	$lo_post = '0';
}

if($_FILES['upload_file'] != NULL){ // 12-18 업로드 테스트 추가문구
    $tmp_name = $_FILES['upload_file']['tmp_name'];
    $ux_name = $_FILES['upload_file']['name'];
	$xname = $_POST['name'];
	$idx1 = $_GET['idx'];
    $path = "../upload/$xname";
    if(!file_exists($path)){
        mkdir($path, 0777, true);
        chmod($path, 0777);
        $up = move_uploaded_file($tmp_name, "$path/$ux_name");
    }else{
        $up = move_uploaded_file($tmp_name, "$path/$ux_name");
    }
	rename("$path/$ux_name","$path/1.jpg");
}
/* 12-18 업로드 테스트
$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "../upload/".$filename;
move_uploaded_file($tmpfile,$folder);
*/

$mqq = mq("alter table board auto_increment =1"); //auto_increment 값 초기화

$sql= mq("insert into board(name,pw,title,content,date,lock_post,file) values('".$_POST['name']."','".$userpw."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."','".$ux_name."')");
echo "<script>alert('글쓰기 완료되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=/aproj/index.php" />